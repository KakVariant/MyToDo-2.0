<?php

// {id:\d+} - если нужно что-то отправлять get запросом

return [

    // Главная страница:

    'MyToDo' => [
        'controller' => 'main',
        'action' => 'index',
    ],




    // Аккаунты:

    'MyToDo/account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'MyToDo/account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'MyToDo/account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

    'MyToDo/account/googleAuth' => [
        'controller' => 'account',
        'action' => 'googleAuth',
    ],

    'MyToDo/account/recoveryPass' => [
        'controller' => 'account',
        'action' => 'recoveryPass',
    ],

    'MyToDo/account/setting' => [
        'controller' => 'account',
        'action' => 'setting',
    ],

    'MyToDo/account/changePass' => [
        'controller' => 'account',
        'action' => 'changePass',
    ],

    'MyToDo/account/changeAvatar' => [
        'controller' => 'account',
        'action' => 'changeAvatar',
    ],





    // Список дел "TODO":

    'MyToDo/todo/show' => [
        'controller' => 'todo',
        'action' => 'show',
    ],

    'MyToDo/todo/add/{priority:\d+}' => [
        'controller' => 'todo',
        'action' => 'add',
    ],

    'MyToDo/todo/done/{id:\d+}' => [
        'controller' => 'todo',
        'action' => 'done',
    ],

    'MyToDo/todo/delete/{id:\d+}' => [
        'controller' => 'todo',
        'action' => 'delete',
    ],





    // Группировка заданий:

    'MyToDo/groupTask/show' => [
        'controller' => 'groupTask',
        'action' => 'show',
    ],

    'MyToDo/groupTask/add' => [
        'controller' => 'groupTask',
        'action' => 'add',
    ],

    'MyToDo/groupTask/selected/{id:\d+}' => [
        'controller' => 'groupTask',
        'action' => 'selected',
    ],

    'MyToDo/groupTask/delete/{id:\d+}' => [
        'controller' => 'groupTask',
        'action' => 'delete',
    ],






     // Дневник:

     'MyToDo/diary/show' => [
        'controller' => 'diary',
        'action' => 'show',
    ],

    'MyToDo/diary/add' => [
        'controller' => 'diary',
        'action' => 'add',
    ],

    'MyToDo/diary/delete/{id:\d+}' => [
        'controller' => 'diary',
        'action' => 'delete',
    ],

    'MyToDo/diary/bookmarks/{id:\d+}' => [
        'controller' => 'diary',
        'action' => 'bookMarks',
    ],





    // Выбор темы:

    'MyToDo/theme/show' => [
        'controller' => 'theme',
        'action' => 'show',
    ],

    'MyToDo/theme/select/{id:\d+}' => [
        'controller' => 'theme',
        'action' => 'select',
    ],







    // Поддержка:

    'MyToDo/report/show' => [
        'controller' => 'report',
        'action' => 'show',
    ],
];