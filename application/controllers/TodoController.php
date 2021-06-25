<?php

namespace application\controllers;

use application\core\Controller;

class TodoController extends Controller
{
    public function showAction()
    {
        if ($this->model->isGroup())
            {
                $this->model->getNameGrop();
                $vars = [
                    'name_group' => $this->model->getNameGrop(),
                    'lowTask' => $this->model->showLowPriority(),
                    'mediumTask' => $this->model->showMediumPriority(),
                    'highTask' => $this->model->showHighPriority(),
                    'doneTask' => $this->model->showDoneTask(),
                ];
                $this->view->render('My ToDo - список дел', $vars);

                if(!empty($_POST))
                {
                    if(!empty($_POST['task']))
                    {
                        $this->view->prioritySelection();
                        $_SESSION['task'] = $_POST['task'];
                    }
                    else
                    {
                        $this->view->message('Ошибка!', 'Нельзя добавить пустую задачу', 'error');
                    }
                }
            }
            else
            {
                $this->view->redirect("/MyToDo/groupTask/show");
            }
    }

    public function addAction()
    {
        $this->model->addTask($_SESSION['task'], $this->route['priority'], $_COOKIE['email'], $_COOKIE['group_id']);
        session_unset();
        $this->view->redirect('/MyToDo');
    }

    public function doneAction()
    {
        if($this->model->doneTask($this->route['id']))
        {
            $this->view->redirect('/MyToDo');
        }
    }

    public function deleteAction()
    {
        if($this->model->deleteTask($this->route['id']))
        {
            $this->view->redirect('/MyToDo');
        }
    }

    public function poleAction()
    {
        parent::__construct($this->route);
        $this->view->layout = 'pole';
        $this->view->render('My ToDo - поле чудес');
    }

    public function addTaskRuleAction()
    {
        $this->model->addTaskRule();
        $this->view->redirect('/MyToDo/todo/show');
    }
}