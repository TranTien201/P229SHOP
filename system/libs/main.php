<?php

class main
{
    public $url;
    public $controller_name = "index";
    public $method_name = "index";
    public $controllerPath = "apps/controller/";
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }


    public function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;

        if ($this->url != NULL) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }


    public function loadController()
    {
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controller_name . '.php';
            $this->controller = new $this->controller_name();
        } else {
            $this->controller_name = $this->url[0];
            $fileName = $this->controllerPath . $this->controller_name . '.php';

            if (file_exists($fileName)) {
                include $fileName;

                if (class_exists($this->controller_name)) {
                    $this->controller = new $this->controller_name();
                } else {
                    header("Location:" . BASE_URL . "index");
                }
            } else {
                header("Location:" . BASE_URL . "index");
            }
        }
    }


    public function callMethod()
    {
        if (isset($this->url[2])) {
            $this->method_name = $this->url[1];
            if (method_exists($this->controller, $this->method_name)) {

                $this->controller->{$this->method_name}($this->url[2]);
            } else {
                header("Location:" . BASE_URL . "index");
            }
        } else {
            if (isset($this->url[1])) {
                $this->method_name = $this->url[1];

                if (method_exists($this->controller, $this->method_name)) {

                    $this->controller->{$this->method_name}();
                } else {
                    header("Location:" . BASE_URL . "index");
                }
            } else {

                if (method_exists($this->controller, $this->method_name)) {

                    $this->controller->{$this->method_name}();
                } else {
                    header("Location:" . BASE_URL . "index");
                }
            }
        }
    }
}
