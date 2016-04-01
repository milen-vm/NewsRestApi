<?php

define('ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('ROOT_VIEWS_DIR', ROOT_DIR . 'Application' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('LINK_PREFIX', rtrim(
    str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOT_DIR), DIRECTORY_SEPARATOR)
);

require_once 'Core' . DIRECTORY_SEPARATOR . 'Autoloader.php';

\NewsRestApi\Core\Autoloader::init();

// \MyMVC\Library\Utility\Session::start();

\NewsRestApi\Core\Db\Database::setInstance(
    \NewsRestApi\Config::DB_INSTANCE,
    \NewsRestApi\Config::DB_DRIVE,
    \NewsRestApi\Config::DB_USER,
    \NewsRestApi\Config::DB_PASS,
    \NewsRestApi\Config::DB_NAME,
    \NewsRestApi\Config::DB_HOST);

$router = new \NewsRestApi\Core\Router();
// $router = new \MyMVC\Library\Routing\DefaultRouter();

$app = \NewsRestApi\Core\App::getInstance();
$app->start($router);