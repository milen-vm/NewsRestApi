<?php
namespace NewsRestApi\Controllers;

class BaseController
{

    protected $data;

    public function __construct()
    {
        $this->setData();
    }

    private function setData()
    {
        $rawJson = file_get_contents('php://input');
        $this->data = json_decode($rawJson, true);
    }
}