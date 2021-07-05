<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/MyToDo/public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <?php 
    switch ($_COOKIE['theme']) {
        case 1:
            echo '<link rel="stylesheet" href="/MyToDo/public/styles/neomorf-light-mode.css">';
            break;
        case 2:
            echo '<link rel="stylesheet" href="/MyToDo/public/styles/neomorf-dark-mode.css">';
            break;
        case 3:
            if ($_COOKIE['day'] == 1) 
            {
                echo '<link rel="stylesheet" href="/MyToDo/public/styles/neomorf-light-mode.css">';
            }

            if ($_COOKIE['day'] == 2)
            {
                echo '<link rel="stylesheet" href="/MyToDo/public/styles/neomorf-dark-mode.css">';
            }
            break;
    }
    ?>
</head>
<body id="body">
<nav class="navbar navbar-expand-lg">
        <a href="/MyToDo" class="navbar-brand">My ToDo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle nav">
            <i class="fa fa-bars navbar-toggler-icon" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="mobile-row" />
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/MyToDo/groupTask/show" class="nav-link">Группы заданий</a>
                </li>
                <li class="nav-item">
                    <a href="/MyToDo/diary/show" class="nav-link">Дневник</a>
                </li>
            </ul>
            <hr class="mobile-row" />
            <div class="end-menu">
                <a href="/MyToDo/account/setting" class="profile">
                    <div class="box-mini">
                        <img src="/MyToDo/upload/avatar/<?php echo $_COOKIE['avatar']; ?>" alt="avatar" class="profile-icon">
                    </div>
                    <?php echo $_COOKIE['name']; ?>
                </a>
                <a href="/MyToDo/account/logout" class="profile">
                    <i class="fa fa-sign-out logout" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </nav>

<?php echo $content; ?>

    <script src="/MyToDo/public/scripts/jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>