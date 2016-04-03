<?php
namespace NewsRestApi\Core;

class Router
{

    private $uri;

    private $action;

    private $controller;

    private $params = [];

    public function __construct()
    {
        $this->setUri();
        $this->setAction();
        $this->parseUri();
    }

    private function parseUri()
    {
        $pathParts = array_filter(explode('/', $this->uri),
            function ($val)
            {
                return $val != '';
            });

        $this->setController(array_shift($pathParts));
        $this->params = $pathParts;
    }

    private function setUri()
    {
        $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $baseDir = dirname($_SERVER['PHP_SELF']);
        $uri = str_replace($baseDir, '', $request);
        $this->uri = trim($uri, '/');
    }

    public function getAction()
    {
        return $this->action;
    }

    private function setAction()
    {
        $this->action = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getController()
    {
        return $this->controller;
    }

    private function setController($controller)
    {
        $this->controller = strtolower($controller);
    }

    public function getParams()
    {
        return $this->params;
    }
}