<?php
namespace NewsRestApi\Core;

use NewsRestApi\Core\Router;

class App
{

    const CONTROLLERS_NAMESPACE = '\\NewsRestApi\\Controllers\\';

    const CONTROLLERS_SUFFIX = 'Controller';

    private static $instance = null;

    private $controler;

    private $method;

    /**
     *
     * @var \NewsRestApi\Core\Router
     */
    private static $router;

    private function __construct()
    {}

    /**
     *
     * @return \NewsRestApi\Core\App
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function start(Router $router)
    {
        self::$router = $router;

        $this->setController(self::$router->getController());
        $this->setMethod(self::$router->getAction());

        call_user_func_array([
            $this->controler,
            $this->method],
            self::$router->getParams()
        );
    }

    private function setController($controller)
    {
        $controllerClass = self::CONTROLLERS_NAMESPACE
            . ucfirst($controller)
            . self::CONTROLLERS_SUFFIX;

        if (!class_exists($controllerClass)) {
//             throw new \Exception('Controller ' . $controllerClass . 'does not exist');

            header('HTTP/1.1 404 Not Found');
            exit();
        }

        $this->controler = new $controllerClass();
    }

    private function setMethod($method)
    {
        if (!method_exists($this->controler, $method)) {
//             throw new \Exception('Method ' . $method .' in class '
//                 . get_class($this->controler) . ' does not exist');
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST, DELETE');
            exit();
        }

        $this->method = $method;
    }

    /**
     *
     * @return \NewsRestApi\Core\Router
     */
    public static function getRouter()
    {
        return self::$router;
    }
}