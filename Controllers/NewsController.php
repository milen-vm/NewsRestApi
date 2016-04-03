<?php
namespace NewsRestApi\Controllers;

use NewsRestApi\Models\NewsModel;
use NewsRestApi\JsonRespons;

class NewsController extends BaseController
{

    public function get($id = null)
    {
        $model = new NewsModel();

        if ($id === null) {
            $news = $model->getAll();
        } else {
            $news = $model->getById($id);
        }

        return new JsonRespons($news);
    }

    public function post($id = null)
    {
        $model = new NewsModel();

        if ($id === null) {
            $result = $model->create($this->data);

            return new JsonRespons(array('id' => $result));
        } else {
            $model->save($id, $this->data);
            return new JsonRespons(array('result' => 'success'));
        }
    }
}