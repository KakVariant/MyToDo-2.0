<?php

namespace application\models;

use application\core\Model;

use function PHPSTORM_META\type;

class Account extends Model
{
    public $err = '';

    public function login($post)
    {
        $email = strip_tags($post['email']);
        $pass = md5(strip_tags($post['pass'])."lldbdgb");

        $users = $this->db->row('SELECT * FROM register WHERE email = \''.$email.'\' AND pass = \''.$pass.'\'');

        if(empty($users) == 0)
        {
            setcookie('avatar', $users[0]['avatar'], time() + 3600 * 4, '/');
            setcookie("group_id", $users[0]['group_task'], time() + 3600 * 4, "/");
            setcookie("email", $users[0]['secure_key'], time() + 3600 * 4, "/");
            setcookie("name", $users[0]['name'], time() + 3600 * 4, "/");
            setcookie("sort", "all", time() + 3600 * 4, "/");
            setcookie("theme", $users[0]['theme'], time() + 3600 * 4, "/");
            date_default_timezone_set('Europe/Kiev');
            setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
            setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
            
            if((int)date('H') > 7 and (int)date('H') < 21)
            {
                setcookie("day", 1, time() + 3600 * 4, "/");
            }
            else
            {
                setcookie("day", 2, time() + 3600 * 4, "/");
            }
            return true;
        }
        else
        {
            $this->err = 'Данные введены неверно.';
            return false;
        }
    }

    public function logout()
    {
        foreach($_COOKIE as $key => $value) setcookie($key, '', time() - 3600 * 4, '/');
    }

    public function register($post)
    {
        $email = strip_tags($post['email']);
        $name = strip_tags($post['name']);
        $pass = strip_tags($post['pass']);

        $secure_pass = md5($pass."lldbdgb");
        $secure_key = md5($email."gvmbvjmj");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->err = 'Email указан не верно!';
            return false;
        }

        if (iconv_strlen($name) < 3)
        {
            $this->err = 'Минимальная длина имени (3)';
            return false;
        }

        if (iconv_strlen($name) > 20)
        {
            $this->err = 'Максимальная длина имени (20)';
            return false;
        }

        if (iconv_strlen($pass) < 6)
        {
            $this->err = 'Минимальная длина пароля (6)';
            return false;
        }

        if (iconv_strlen($pass) > 20)
        {
            $this->err = 'Максимальная длина пароля (20)';
            return false;
        }

        $users = $this->db->column('SELECT * FROM register WHERE email = \''.$email.'\'');

        if(empty($users) == 0)
        {
            $this->err = 'Такой аккаунт уже существует.';
            return false;
        }

        $params = [
            'avatar' => 'noavatar.png',
            'email' => $email,
            'name' => $name,
            'pass' => $secure_pass,
            'secure_key' => $secure_key,
        ];

        $this->db->query('INSERT INTO register (avatar, email, name, pass, theme, group_task, secure_key) VALUES (:avatar, :email, :name, :pass, 1, 0, :secure_key)', $params);

        setcookie("email", $secure_key, time() + 3600 * 4, "/");
        setcookie('avatar', 'noavatar.png', time() + 3600 * 4, '/');
        setcookie("name", $name, time() + 3600 * 4, "/");
        setcookie("sort", "all", time() + 3600 * 4, "/");
        setcookie("theme", "1", time() + 3600 * 4, "/");
        date_default_timezone_set('Europe/Kiev');
        setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
        setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
        setcookie("group_id", 0, time() + 3600 * 4, "/");
        
        if((int)date('H') > 7 and (int)date('H') < 21)
        {
            setcookie("day", 1, time() + 3600 * 4, "/");
        }
        else
        {
            setcookie("day", 2, time() + 3600 * 4, "/");
        }

        return true;
        
    }

    public function googleAuth()
    {

        $email = $_SESSION['email'];
        $name = $_SESSION['name'];

        $secure_key = md5($email."gvmbvjmj");




        $users = $this->db->row('SELECT * FROM register WHERE email = \''.$email.'\'');

        if(empty($users) == 0)
        {
            setcookie('avatar', $users[0]['avatar'], time() + 3600 * 4, '/');
            setcookie("group_id", $users[0]['group_task'], time() + 3600 * 4, "/");
            setcookie("email", $users[0]['secure_key'], time() + 3600 * 4, "/");
            setcookie("name", $users[0]['name'], time() + 3600 * 4, "/");
            setcookie("sort", "all", time() + 3600 * 4, "/");
            setcookie("theme", $users[0]['theme'], time() + 3600 * 4, "/");
            date_default_timezone_set('Europe/Kiev');
            setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
            setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
            
            if((int)date('H') > 7 and (int)date('H') < 21)
            {
                setcookie("day", 1, time() + 3600 * 4, "/");
            }
            else
            {
                setcookie("day", 2, time() + 3600 * 4, "/");
            }
        }
        else
        {
            $params = [
                'avatar' => 'noavatar.png',
                'email' => $email,
                'name' => $name,
                'pass' => '',
                'secure_key' => $secure_key,
            ];

            $this->db->query('INSERT INTO register (avatar, email, name, pass, theme, group_task, secure_key) VALUES (:avatar, :email, :name, :pass, 1, 0, :secure_key)', $params);

            setcookie("email", $secure_key, time() + 3600 * 4, "/");
            setcookie('avatar', 'noavatar.png', time() + 3600 * 4, '/');
            setcookie("name", $name, time() + 3600 * 4, "/");
            setcookie("sort", "all", time() + 3600 * 4, "/");
            setcookie("theme", "1", time() + 3600 * 4, "/");
            date_default_timezone_set('Europe/Kiev');
            setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
            setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
            setcookie("group_id", '0', time() + 3600 * 4, "/");

            if((int)date('H') > 7 and (int)date('H') < 21)
            {
                setcookie("day", 1, time() + 3600 * 4, "/");
            }
            else
            {
                setcookie("day", 2, time() + 3600 * 4, "/");
            }
        }
        session_unset();
        return true;
    }

    public function recoveryPass($post)
    {
        $email = $post['email'];

        $users = $this->db->column('SELECT * FROM register WHERE email = \''.$email.'\'');

        if(!empty($users) == 0)
        {
            $this->err = 'Такого аккаунта не существует.';
            return false;
        }

        $newPass = rand(1000, 999999);
        $subject = "Восстановление пароля";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: rkhorolskij@gmail.com\r\nReply-to: $email\r\nContent-type: text/html; charset=\"utf-8\"\r\n";
        $message = "Вы успешно восстановили пароль на сайте My ToDo<br />Ваш новый пароль: ".$newPass;

        mail($email, $subject, $message, $headers);

        $newPass = md5($newPass . "lldbdgb");

        $params = [
            'newPass' => $newPass,
            'email' => $email,
        ];

        $this->db->query('UPDATE register SET pass = :newPass WHERE email = :email', $params);

        return true;
    }

    public function changePass($post)
    {
        $oldPass =  md5(strip_tags($post['oldPassword'])."lldbdgb");
        $newPass = strip_tags($post['newPassword']);
        $replacePass = strip_tags($post['replacePassword']);

        $params = [
            'email' => $_COOKIE['email'],
            'pass' => $oldPass,
        ];
        $tmp = $this->db->column('SELECT * FROM register WHERE secure_key = :email AND pass = :pass', $params);

        if(!empty($tmp) == 0)
        {
            $this->err = 'Старый пароль указан не верно!';
            return false;
        }

        if (iconv_strlen($newPass) < 6)
        {
            $this->err = 'Минимальная длина пароля (6)';
            return false;
        }

        if (iconv_strlen($newPass) > 20)
        {
            $this->err = 'Максимальная длина пароля (20)';
            return false;
        }

        if(strcmp($newPass, $replacePass) != 0)
        {
            $this->err = 'Новый пароль не совпадает. Пожалуйста, попробуйте ещё раз, возможно вы ввели новый пароль не так, как хотели бы.';
            return false;
        }

        $params = [
            'newPass' => md5($newPass."lldbdgb"),
            'email' => $_COOKIE['email'],
        ];

        $this->db->query('UPDATE register SET pass = :newPass WHERE secure_key = :email', $params);

        $params = [
            'secure_key' => $_COOKIE['email'],
        ];
        $tmp = $this->db->row('SELECT email FROM register WHERE secure_key = :secure_key', $params);

        $email = $tmp[0]['email'];
        $subject = "My ToDo - смена пароля";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: rkhorolskij@gmail.com\r\nReply-to: $email\r\nContent-type: text/html; charset=\"utf-8\"\r\n";
        $message = "Вы успешно сменили пароль на сайте My ToDo<br />Ваш новый пароль: ".$newPass;

        mail($email, $subject, $message, $headers);
        return true;
    }

    public function setAvatar($images)
    {
        if($images['type'] == 'image/jpeg' or $images['type'] == 'image/jpg' or $images['type'] == 'image/png')
        {
            $params = [
                'user_id' => $_COOKIE['email'],
            ];
            $isNoAvatar = $this->db->row('SELECT avatar FROM register WHERE secure_key = :user_id', $params);
            if($isNoAvatar[0]['avatar'] != 'noavatar.png')
            {
                unlink('upload/avatar/'.$isNoAvatar[0]['avatar']);
            }




            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; // Просто набор цифр и букв

            $type = stristr($images['type'], '/');
            $type = substr($type, 1);
            $name = substr(str_shuffle($permitted_chars), 0, 10).'.'.$type; // Перемешиваю цифры, буквы и обрезою до 10 символов, тем самым получаю рандомное имя для файла)

            $path = 'upload/avatar/'.$name;

            move_uploaded_file($images['tmp_name'], $path);

            $params = [
                'avatar' => $name,
                'user_id' => $_COOKIE['email'],
            ];
            $this->db->query('UPDATE register SET avatar = :avatar WHERE secure_key = :user_id', $params);

            setcookie('avatar', $name, time() + 3600 * 4, '/');
            return true;
        }

        else
        {
            $this->err = 'Такой тип файла не поддерживается. Аватар можно загрузить тоглько с форматом ".jpg, .jpeg, .png"';
            return false;
        }
    }
}