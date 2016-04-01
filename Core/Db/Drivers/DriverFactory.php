<?php
namespace NewsRestApi\Core\Db\Drivers;

use NewsRestApi\Core\Db\Drivers\MySQLDriver;

class DriverFactory
{

    const DRIVER_MYSQL = 'mysql';

    public static function create($driver, $username, $password, $dbName, $host = null)
    {
        switch ($driver) {
        	case self::DRIVER_MYSQL:
        	   return new MySQLDriver($username, $password, $dbName, $host);
        	default:
        		throw new \Exception('Invalid database driver.');
        }
    }
}