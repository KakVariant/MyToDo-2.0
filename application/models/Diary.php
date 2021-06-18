<?php

namespace application\models;

use application\core\Model;

class Diary extends Model
{
    public function getAllNotes()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
        ];
        return $this->db->row('SELECT * FROM diary WHERE user_id = :user_id', $params);
    }

    public function getMarkNotes()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
        ];
        return $this->db->row('SELECT * FROM diary WHERE user_id = :user_id AND activity = 1', $params);
    }

    public function getDateNotes()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
            'date' => $_COOKIE['date'],
        ];
        return $this->db->row('SELECT * FROM diary WHERE user_id = :user_id AND date = :date', $params);
    }



    public function setMarks($id)
    {
        $params = [
            'id' => $id,
            'user_id' => $_COOKIE['email'],
        ];

        $tmp = $this->db->row('SELECT activity FROM diary WHERE id = :id AND user_id = :user_id', $params);

        if((int)$tmp[0]['activity'] == 1)
        {
            $this->db->query('UPDATE diary SET activity = 0 WHERE id = :id AND user_id = :user_id', $params);
        }
        else
        {
            $this->db->query('UPDATE diary SET activity = 1 WHERE id = :id AND user_id = :user_id', $params);
        }
    }

    public function delete($id)
    {
        $params = [
            'id' => $id,
            'user_id' => $_COOKIE['email'],
        ];

        $this->db->query('DELETE FROM diary WHERE id = :id AND user_id = :user_id', $params);
    }



    public function add()
    {
        date_default_timezone_set('Europe/Kiev');
        $params = [
            'title' => strip_tags($_SESSION['title']),
            'description' => strip_tags($_POST['description']),
            'time' => date("H:i"),
            'date' => date('d.m.Y'),
            'user_id' => $_COOKIE['email'],
        ];
        

        $this->db->query('INSERT INTO diary (title, description, activity, date, time, user_id) VALUES (:title, :description, 0, :date, :time, :user_id)', $params);
        session_unset();
        return true;
    }

    public function sort()
    {
        if(strnatcasecmp($_COOKIE['sort'], 'all') == 0)
        {
            return $vars = [
                'list' => $this->getAllNotes(),
            ];
        }
        if(strnatcasecmp ($_COOKIE['sort'], 'mark') == 0)
        {
            return $vars = [
                'list' => $this->getMarkNotes(),
            ];
        }
        if(strnatcasecmp ($_COOKIE['sort'], 'day') == 0)
        {
            return $vars = [
                'list' => $this->getDateNotes(),
            ];
        }

        return false;
    }
}