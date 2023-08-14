<?php

class App
{
    protected $controller = null;
    protected $method = 'index';
    protected $language = 'en';
    protected $params = [];

    protected $reqParams = [];

    protected $uri = [];

    public function __construct()
    {
        $req = $this->parseUrl();
        $this->uri = $this->getUriSegments();
        $this->reqParams = $this->getRequestParameters();
        $isInHomePage = $this->isInHomePage();

        if ($isInHomePage) {
            $this->controller = 'home';
        }

        if (!$isInHomePage && $this->getFirstInSegment() && file_exists('../app/controllers/' . $this->getFirstInSegment() . '.php')) {
            $this->controller = $this->getFirstInSegment();
        }

        if (!$isInHomePage && (!$this->controller || !file_exists('../app/controllers/' . $this->controller . '.php'))) {
            http_response_code(404);
            $controller = new Controller();
            header('Content-Type: text/html');
            $controller->view('errors/404');
            return;
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($this->reqParams['method']) && method_exists($this->controller, $this->reqParams['method'])) {
            $this->method = $this->reqParams['method'];
            unset($req[1]);
        }

        $this->params = $req ? array_values($req) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['req'])) {
            return explode('/', filter_var(rtrim($_GET['req'], '/'), FILTER_SANITIZE_URL));
        }
    }

    public function getRequestParameters()
    {
        return $_GET;
    }

    public function isInHomePage()
    {
        $emptyUris = true;

        foreach ($this->uri as $uri) {
            if ($uri) {
                $emptyUris = false;
            }
        }

        if ($emptyUris && file_exists('../app/controllers/home.php')) {
            return true;
        }

        return false;
    }

    public function getUriSegments()
    {
        return explode('/', $_SERVER['REQUEST_URI']);
    }

    public function getFirstInSegment(): string
    {
        $segments = $this->getUriSegments();

        foreach ($segments as $segment) {
            if ($segment) {
                return $segment;
            }
        }

        return '';
    }
}
