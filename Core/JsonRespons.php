<?php
namespace NewsRestApi\Core;

class JsonRespons
{

    public function __construct($data, $status = 200)
    {
//         header('Access-Control-Allow-Origin: *');
//         header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        $this->response($data, $status);
    }

    private function response($data, $statusCode)
    {
        header('HTTP/1.1 ' . $statusCode . ' ' . $this->requestStatus($statusCode));

//         echo json_encode($data, JSON_UNESCAPED_UNICODE);
        echo json_encode($data);
    }

    private function requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            500 => 'Internal Server Error',
        );

        $resultStatus = isset($status[$code]) ? $status[$code] : $status[500];

        return $resultStatus;
    }
}