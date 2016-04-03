<?php
namespace NewsRestApi\Core;

class JsonRespons
{

    public function __construct($data, $status = 200)
    {
        $data = $this->escaping($data);

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, DELETE');
        header('Content-Type: application/json');

        $this->response($data, $status);
    }

    private function response($data, $statusCode)
    {
        header('HTTP/1.1 ' . $statusCode . ' ' . $this->requestStatus($statusCode));

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
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

    private function escaping($data)
    {
        foreach ($data as $key => $value) {

            if (is_array($value)) {
                $data[$key] = $this->escaping($value);
            } else {
                $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }

        return $data;
    }
}