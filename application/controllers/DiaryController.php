<?php

namespace application\controllers;

use application\core\Controller;

class DiaryController extends Controller
{
    public function showAction()
    {
        if (!empty($_POST))
        {
            if(isset($_POST['sort']))
            {
                setcookie("sort", $_POST['select-sort'], time() + 3600 * 4, "/");
                setcookie("date-sf", $_POST['inpDate'], time() + 3600 * 4, "/");

                $arr = explode("-", $_POST["inpDate"]);
                $date = $arr[2].".".$arr[1].".".$arr[0];
                setcookie("date", $date, time() + 3600 * 4, "/");
                header("Refresh:0");
            }
        }

        $this->view->render('My ToDo дневник', $this->model->sort());

        if (!empty($_POST))
        {
            if(isset($_POST['add']))
            {
                if(!empty($_POST['title']))
                {
                    $this->view->inputModal('Создание записи', 'textarea', 300, 'description', 'Введите описания события)', 'POST', '/MyToDo/diary/add', 'Добавить');
                    $_SESSION['title'] = $_POST['title'];
                }
                else
                {
                    $this->view->message('Ошибка!', 'Нельзя добавить пустую запись', 'error');
                }
            }
        }
    }

    public function addAction()
    {
        $this->model->add();
        $this->view->redirect('/MyToDo/diary/show');
    }

    public function bookMarksAction()
    {
        $this->model->setMarks($this->route['id']);
        $this->view->redirect('/MyToDo/diary/show');
    }

    public function deleteAction()
    {
        $this->model->delete($this->route['id']);
        $this->view->redirect('/MyToDo/diary/show');
    }
}