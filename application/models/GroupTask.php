<?php

namespace application\models;

use application\core\Model;

class GroupTask extends Model
{
    public function getListGroup()
    {
        $params = [
            'user_id' => $_COOKIE['email'],
        ];

        return $this->db->row('SELECT id, name, activity FROM group_task WHERE user_id = :user_id', $params);
    }













    public function add($post)
    {
        $params = [
            'name_group' => strip_tags($post['nameGroup']),
            'user_id' => $_COOKIE['email'],
        ];

        $this->db->query('INSERT INTO group_task (name, activity, user_id) VALUES (:name_group, 0, :user_id)', $params);
        return true;
    }




    public function selected($id)
    {
        $params = [
            'user_id' => $_COOKIE['email'],
        ];

        $this->db->query('UPDATE group_task SET activity = 0 WHERE `group_task`.`user_id` = :user_id', $params);

        $params = [
            'user_id' => $_COOKIE['email'],
            'id' => $id,
        ];

        $this->db->query('UPDATE group_task SET activity = 1 WHERE `group_task`.`id` = :id AND `user_id` = :user_id', $params);

        $this->db->query('UPDATE register SET group_task = :id WHERE `register`.`secure_key` = :user_id', $params);

        setcookie("group_id", $id, time() + 3600 * 4, "/");

        return true;
    }

    public function delete($id)
    {
        $params = [
            'id' => $id,
            'user_id' => $_COOKIE['email'],
        ];

        $isActivity = $this->db->row('SELECT activity FROM group_task WHERE id = :id AND user_id = :user_id', $params);
        

        $this->db->query('DELETE FROM group_task WHERE `group_task`.`id` = :id AND `user_id` = :user_id', $params);
        $this->db->query('DELETE FROM todo WHERE `todo`.`group_id` = :id AND `user_id` = :user_id', $params);
        
        if ((int)$isActivity[0]['activity'] == 1)
        {
            $params = [
                'user_id' => $_COOKIE['email'],
            ];

            $this->db->query('UPDATE register SET group_task = 0 WHERE `register`.`secure_key` = :user_id', $params);
            setcookie("group_id", 0, time() + 3600 * 4, "/");
        }

        return true;
    }

    
}