<?php

namespace application\controllers;

use application\core\Controller;

class GroupTaskController extends Controller
{
    public function showAction()
    {
        $vars = [
            'list' => $this->model->getListGroup(),
        ];
        $this->view->render('My ToDo группировка заданий', $vars);
        if(!empty($_POST))
        {
            $this->view->inputModal('Создание группы', 'text', 13, 'nameGroup', 'Придумайте название группы', 'POST', '/MyToDo/groupTask/add', 'Создать');
        }
    }

    public function addAction()
    {
        if(!empty($_POST))
        {
            $this->model->add($_POST);
        }
        $this->view->redirect('/MyToDo/groupTask/show');
    }

    public function selectedAction()
    {
        if ($this->model->selected($this->route['id']))
        {
            $this->view->redirect('/MyToDo');
        }
    }

    public function deleteAction()
    {
        if ($this->model->delete($this->route['id']))
        {
            $this->view->redirect('/MyToDo/groupTask/show');
        }
    }
}