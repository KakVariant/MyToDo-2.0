<?php

namespace application\controllers;

use application\core\Controller;

class ThemeController extends Controller
{
    public function showAction()
    {
        $this->view->render('My ToDo - выбор темы');
    }

    public function selectAction()
    {
        $this->model->select($this->route['id']);
        $this->view->redirect('/MyToDo/theme/show');
    }
}