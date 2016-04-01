<?php

define('ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('ROOT_VIEWS_DIR', ROOT_DIR . 'Application' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('LINK_PREFIX', rtrim(
    str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOT_DIR), DIRECTORY_SEPARATOR)
);

require_once 'Core' . DIRECTORY_SEPARATOR . 'Autoloader.php';

\NewsRestApi\Core\Autoloader::init();

\NewsRestApi\Config::DB_NAME;

// \MyMVC\Library\Utility\Session::start();

// \MyMVC\Library\Core\Database::setInstance(
//     \MyMVC\Library\Config::get('dbInstance'),
//     \MyMVC\Library\Config::get('dbDrive'),
//     \MyMVC\Library\Config::get('dbUser'),
//     \MyMVC\Library\Config::get('dbPass'),
//     \MyMVC\Library\Config::get('dbName'),
//     \MyMVC\Library\Config::get('dbHost')
// );

// $router = new \MyMVC\Library\Routing\DefaultRouter();

// $app = \MyMVC\Library\App::getInstance();
// $app->start($router);