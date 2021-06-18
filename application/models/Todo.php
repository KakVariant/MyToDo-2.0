<?php

namespace application\models;

use application\core\Model;

class Todo extends Model
{
    public function isGroup()
    {
        if(isset($_COOKIE['group_id']))
        {
            if ((int)$_COOKIE['group_id'] != 0)
            {
                return true;
            }
        }

        return false;
    }




    public function addTask($task, $priority, $user_id, $group_id)
    {
        $params = [
            'task' => strip_tags($task),
            'priority' => $priority,
            'user_id' => $user_id,
            'group_id' => $group_id,
        ];

        $this->db->query('INSERT INTO todo (task, activity, priority, group_id, user_id) VALUES (:task, 0, :priority, :group_id, :user_id)', $params);
        return true;
    }




    public function doneTask($id)
    {
        $params = [
            'id' => $id,
            'user_id' => $_COOKIE['email'],
        ];

        $isActivity = $this->db->row('SELECT activity FROM todo WHERE id = :id AND user_id = :user_id', $params);

        if((int)$isActivity[0]['activity'] == 0)
        {
            $this->db->row('UPDATE todo SET activity = 1 WHERE id = :id AND user_id = :user_id', $params);
        }
        else
        {
            $this->db->row('UPDATE todo SET activity = 0 WHERE id = :id AND user_id = :user_id', $params);
        }

        return true;
    }

    public function deleteTask($id)
    {
        $params = [
            'id' => $id,
            'user_id' => $_COOKIE['email'],
        ];

        $this->db->row('DELETE FROM todo WHERE id = :id AND user_id = :user_id', $params);
        return true;
    }






    public function getNameGrop()
    {
        $params = [
            'id' => $_COOKIE['group_id'],
            'user_id' => $_COOKIE['email'],
        ];

        return $this->db->row('SELECT name FROM group_task WHERE id = :id AND user_id = :user_id', $params);
    }
    public function showLowPriority()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
            'group_id' => $_COOKIE['group_id'],
        ];
        return $this->db->row('SELECT id, task FROM todo WHERE user_id = :user_id AND group_id = :group_id AND priority = 0 AND activity = 0 ORDER BY `todo`.`id` DESC', $params);
    }
    public function showMediumPriority()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
            'group_id' => $_COOKIE['group_id'],
        ];
        return $this->db->row('SELECT id, task FROM todo WHERE user_id = :user_id AND group_id = :group_id AND priority = 1 AND activity = 0 ORDER BY `todo`.`id` DESC', $params);
    }
    public function showHighPriority()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
            'group_id' => $_COOKIE['group_id'],
        ];
        return $this->db->row('SELECT id, task FROM todo WHERE user_id = :user_id AND group_id = :group_id AND priority = 2 AND activity = 0 ORDER BY `todo`.`id` DESC', $params);
    }
    public function showDoneTask()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
            'group_id' => $_COOKIE['group_id'],
        ];
        return $this->db->row('SELECT id, task FROM todo WHERE user_id = :user_id AND group_id = :group_id AND activity = 1 ORDER BY `todo`.`id` DESC', $params);
    }
}