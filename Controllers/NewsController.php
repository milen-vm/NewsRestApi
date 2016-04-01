<?php
namespace NewsRestApi\Controllers;

class NewsController
{

    public function get($id = null)
    {
        echo 'get news ';var_dump($id);
    }
}