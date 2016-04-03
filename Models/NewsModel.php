<?php
namespace NewsRestApi\Models;

use NewsRestApi\Exceptions\NewsException;

class NewsModel extends BaseModel
{

    const MODEL_TABLE_NAME = 'news';

    public function __construct()
    {
        parent::__construct(['table' => self::MODEL_TABLE_NAME]);
    }

    public function getAll()
    {
        $news = $this->findAll(array(
            'select' => 'id, title, date, text',
            'orderby' => 'date DESC',
        ));

        return $news;
    }

    public function getById($id)
    {
        $news = $this->find(array(
            'select' => 'id, title, date, text',
            'where' => 'id = ?',
        ), array($id));

        return $news;
    }

    public function create($data)
    {
        $this->validateNewsFields($data);

        $pairs = array(
        	'title' => $data['title'],
            'date' => $data['date'],
            'text' => $data['text']
        );

        $result = $this->insert($pairs);

        return $result;
    }

    public function save($id, $data)
    {
        $this->validateNewsFields($data);

        $this->update(array(
        	'set' => 'title=?, date=?, text=?',
            'where' => 'id=?'
        ), array(
            $data['title'],
            $data['date'],
            $data['text'],
            $id
        ));
    }

    // Validation is very simple and can be improved
    private function validateNewsFields($data)
    {
        if (!isset($data['title']) || !isset($data['date']) || !isset($data['text'])) {
            throw new NewsException('Some of the input fields are empty.', 400);
        }

        if (!$this->validateDate($data['date'])) {
            throw new NewsException('Invalid date time format.', 400);
        }
    }

    private function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = \DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }
}