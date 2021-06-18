<?php

namespace application\models;

use application\core\Model;

class Theme extends Model
{
    public function select($id)
    {
        setcookie('theme', $id, time() + 3600 * 4, '/');
        $params = [
            'theme_id' => $id,
            'user_id' => $_COOKIE['email'],
        ];
        $this->db->query('UPDATE register SET theme = :theme_id WHERE secure_key = :user_id', $params);
        return true;
    }
}