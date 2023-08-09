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
        $isInHomePage = $this->isInHomePage();
        $req = $this->parseUrl();
        $this->uri = $this->getUriSegments();
        $this->reqParams = $this->getRequestParameters();

        if ($isInHomePage) {
            $this->controller = 'home';
            $isInHomePage = true;
        }

        if (!$isInHomePage && file_exists('../app/controllers/' . $this->uri[0] . '.php')) {
            $this->controller = $this->uri[0];
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
}
