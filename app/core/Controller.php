<?php

class Controller
{
    public function view($view,  $data = [])
    {
        $data['view'] = $view;

        require_once '../app/views/layout/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/layout/footer.php';
    }
}