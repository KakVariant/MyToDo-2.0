<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{


    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'account';
    }



    public function loginAction()
    {
        $this->view->render('My ToDo - вход');

        if(!empty($_POST))
        {
            if (!$this->model->login($_POST))
            {
                $this->view->message('Ошибка!', $this->model->err, 'error');
            }
            else
            {
                $this->view->timesOfDay();
                $this->view->redirect("/MyToDo");
            }
        }
    }

    public function registerAction()
    {
        $this->view->render('My ToDo - страница регистрации');

        if(!empty($_POST))
        {
            if (!$this->model->register($_POST))
            {
                $this->view->message('Ошибка!', $this->model->err, 'error');
            }
            else
            {
                $this->view->timesOfDay();
                $this->view->redirect("/MyToDo");
            }
        }
    }

    public function googleAuthAction()
    {

         if ($this->model->googleAuth())
         {
            $this->view->timesOfDay();
            $this->view->redirect("/MyToDo");
         }
    }

    public function logoutAction()
    {
        $this->model->logout();
        $this->view->redirect("/MyToDo/account/login");
    }

    public function recoveryPassAction()
    {
        $this->view->render('My ToDo - восстановление пароля');

        if(!empty($_POST))
        {
            if (!$this->model->recoveryPass($_POST))
            {
                $this->view->message('Ошибка!', $this->model->err, 'error');
            }
            else
            {
                $this->view->message('Успешно!', 'Мы отправили письмо с новым паролем на Ваш Email', 'success');
            }
        }
    }

    public function settingAction()
    {
        $this->view->layout = 'default';

        $this->view->render('My ToDo - настройки пользователя');
        
    }

    public function changePassAction()
    {
        $this->view->layout = 'default';

        $this->view->render('My ToDo - смена пароля');

        if (!empty($_POST))
        {
            if($this->model->changePass($_POST))
            {
                $this->view->message('Успешно!', 'Вы успешно сменили пароль.', 'info');
            }
            else
            {
                $this->view->message('Ошибка!', $this->model->err, 'error');
            }
        }
        
    }

    public function changeAvatarAction()
    {
        if(!empty($_FILES))
        {
            $this->model->setAvatar($_FILES['file']);
        }
        
        $this->view->redirect("/MyToDo/account/setting");
    }
}