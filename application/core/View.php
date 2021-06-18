<?php

namespace application\core;

class View 
{
    public $path;
    public $route;
    public $layout = 'default';






    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path))
        {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }
        else
        {
            echo 'Вид не найден: '.$this->path;
        }
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if (file_exists($path))
        {
            require $path;
        }
        exit;
    }

    public function timesOfDay()
    {
        date_default_timezone_set('Europe/Kiev');
        if (date("H") > 6 and date("H") < 20)
        {
            setcookie('day', 1, time() + 3600 * 4, '/');
            return true;
        }

        if (date("H") > 20 or date("H") < 6)
        {
            setcookie('day', 2, time() + 3600 * 4, '/');
            return true;
        }
    }

    public function message($header, $message, $status)
    {
        echo '<script>Swal.fire(
            "'.$header.'",
            "'.$message.'",
            "'.$status.'"
        );</script>';
    }

    public function inputModal($header, $inputType, $maxlength, $inputName, $inputPlaceholder, $method, $action, $buttonText)
    {
        $tmp = '';


        if(!strnatcasecmp($inputType, 'textarea'))
        {
            $tmp = "<textarea maxlength=\"".$maxlength."\" style=\"width: 100%; background-color: transparent;\" autocomplete=\"off\" class=\"input-text\" name=\"".$inputName."\" placeholder=\"".$inputPlaceholder."\" id=\"input-text\"></textarea>";
        }

        else
        {
            $tmp = "<input maxlength=\"".$maxlength."\" style=\"width: 100%; background-color: transparent;\" autocomplete=\"off\" class=\"input-text\" type=\"".$inputType."\" name=\"".$inputName."\" placeholder=\"".$inputPlaceholder."\" id=\"input-text\">";
        }


        echo "
        <script>
        Swal.fire({
            title: '".$header."',
            showConfirmButton: false,
            html:
              '<form class=\"d-flex flex-column justify-content-end\" action=\"".$action."\" method=\"".$method."\">' +
              '".$tmp."' +
              '<button style=\"width: 30%; margin-right: 0; margin-top: 15px;\" type=\"submit\" class=\"btn btn-success\">".$buttonText."</button>' +
          '</form>',
          })
        </script>";
    }

    public function prioritySelection()
    {
        echo "
        <script>
        Swal.fire({
            title: 'Укажите приоритет задачи',
            showConfirmButton: false,
            popup: 'modal',
            footer: '<a href=\"/MyToDo/todo/add/0\" class=\"btn btn-success\">Слабый</a><a href=\"/MyToDo/todo/add/1\" class=\"btn btn-warning\">Средний</a><a href=\"/MyToDo/todo/add/2\" class=\"btn btn-danger\">Высокий</a>'
          });
        </script>";
    }
}