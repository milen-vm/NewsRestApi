<?php
namespace NewsRestApi\Core\Db\Drivers;

class MySQLDriver extends BaseDriver
{

    public function getDSN()
    {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.';charset=utf8';

        return $dsn;
    }
}