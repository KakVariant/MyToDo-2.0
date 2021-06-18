<h1 class="title">Вход в My ToDo</h1>
    <div class="container-sm d-flex justify-content-center">
        <form class="d-flex flex-column justify-content-center" action="/MyToDo/account/login" method="POST">
            <label for="email" class="label">Введите email</label>
            <input type="email" class="input-text" size="32px" id="email" name="email" placeholder="Email">
            <br />
            <label for="pass" class="label">Введите пароль</label>
            <input type="password" class="input-text" size="32px" id="pass" name="pass" placeholder="Пароль">
            <br />
            <button type="submit" class="btn btn-custom">Войти</button>




            <a class="btn btn-custom btn-reg" href="/MyToDo/account/register">Регистрация</a>
            <?php
                $params = array(
                    'client_id'     => '364584403394-8f3op4c3f6r3idtfhdm9bfj7shsc595e.apps.googleusercontent.com',
                    'redirect_uri'  => 'http://'.$_SERVER['SERVER_NAME'].'/MyToDo/application/lib/login_google.php',
                    'response_type' => 'code',
                    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
                    'state'         => '123'
                );

                $url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
                echo '
                <a class="btn btn-custom btn-reg d-flex justify-content-center" href="' . $url . '">Авторизация через&nbsp;<div class="google-logo d-flex"><div class="g">G</div><div class="o">o</div><div class="o-two">o</div><div class="g">g</div><div class="l">l</div><div class="e">e</div></div></a>
                ';
                ?>


            <br />
            <div class="d-flex justify-content-end notes">
                Забыли пароль?&nbsp;&nbsp;
                <a href="/MyToDo/account/recoveryPass">Восстановить</a>
            </div>
        </form>
    </div>