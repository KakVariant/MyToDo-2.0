<?php

namespace application\models;

use application\core\Model;

class Report extends Model
{
    public $err = '';

    public function message($post)
    {
        $params = [
            'secure_key' => $_COOKIE['email'],
        ];
        $tmp = $this->db->row('SELECT email FROM register WHERE secure_key = :secure_key', $params);

        $email = $tmp[0]['email'];
        $message = strip_tags($post['message']);

        $subject = "Поддержка сайта 'My ToDo'";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: ".$email."\r\nReply-to: rkhorolskij@gmail.com\r\nContent-type: text/html; charset=\"utf-8\"\r\n";
        $message = "Сообщение от пользователя ".$email.":<br /> - ".$message;

        mail($email, $subject, $message, $headers);
        return true;
    }
}