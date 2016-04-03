<?php
namespace NewsRestApi\Controllers;

use NewsRestApi\Models\NewsModel;
use NewsRestApi\Core\JsonRespons;
use NewsRestApi\Exceptions\NewsException;

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
        $respons = array();
        $code = 200;

        try {
            if ($id === null) {
                $respons['id'] = $model->create($this->data);
            } else {
                $model->save($id, $this->data);
                $respons['result'] = 'success';
            }

        } catch (NewsException $ne) {
            $respons['error'] = $ne->getMessage();
            $code = $ne->getCode();
        }

        return new JsonRespons($respons, $code);
    }

    public function delete($id = null)
    {
        $respons = array();
        $code = 200;

        if ($id == null) {
            $respons['error'] = 'News ID is missing.';
            $code = 400;
        } else {
            try {
                $model = new NewsModel();
            	$model->remove($id);
                $respons['result'] = 'success';
            } catch (NewsException $ne) {
                $respons['error'] = $ne->getMessage();
                $code = $ne->getCode();
            }
        }

        return new JsonRespons($respons, $code);
    }
}