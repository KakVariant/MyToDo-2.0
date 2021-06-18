<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function isAccount()
    {
        if(!isset($_COOKIE['email']))
        {
            return false;
        }

        return true;
    }

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
}