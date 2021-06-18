<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        date_default_timezone_set('Europe/Kiev');
        if((int)date('H') > 7 and (int)date('H') < 21)
        {
            setcookie("day", 1, time() + 3600 * 4, "/");
        }
        else
        {
            setcookie("day", 2, time() + 3600 * 4, "/");
        }

        if ($this->model->isAccount())
        {
            if ($this->model->isGroup())
            {
                $this->view->redirect("/MyToDo/todo/show");
            }
            else
            {
                $this->view->redirect("/MyToDo/groupTask/show");
            }
        }
        else
        {
            $this->view->redirect("/MyToDo/account/login");
        }
    }
}