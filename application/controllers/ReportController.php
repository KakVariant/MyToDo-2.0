<?php

namespace application\controllers;

use application\core\Controller;

class ReportController extends Controller
{
    public function showAction()
    {
        $this->view->render('My ToDo - поддержка');

        if (!empty($_POST))
        {
            if ($this->model->message($_POST))
            {
                $this->view->message('Успешно!', 'Ваше сообщение успешно отправлено разработчику данного сайта.', 'info');
            }

            else
            {
                $this->view->message('Ошибка!', $this->model->err, 'error');
            }
        }
    }
}