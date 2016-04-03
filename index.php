<?php

define('ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once 'Core' . DIRECTORY_SEPARATOR . 'Autoloader.php';

\NewsRestApi\Core\Autoloader::init();

\NewsRestApi\Core\Db\Database::setInstance(
    \NewsRestApi\Config::DB_INSTANCE,
    \NewsRestApi\Config::DB_DRIVE,
    \NewsRestApi\Config::DB_USER,
    \NewsRestApi\Config::DB_PASS,
    \NewsRestApi\Config::DB_NAME,
    \NewsRestApi\Config::DB_HOST);

$router = new \NewsRestApi\Core\Router();

$app = \NewsRestApi\Core\App::getInstance();
$app->start($router);