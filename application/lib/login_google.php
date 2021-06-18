<?php

if (!empty($_GET['code'])) {
    // Отправляем код для получения токена (POST-запрос).
    $params = array(
        'client_id'     => '364584403394-8f3op4c3f6r3idtfhdm9bfj7shsc595e.apps.googleusercontent.com',
        'client_secret' => 'dGmTgop546-QIXrclBpw020x',
        'redirect_uri'  => 'http://'.$_SERVER['SERVER_NAME'].'/MyToDo/application/lib/login_google.php',
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    );

    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);
    if (!empty($data['access_token'])) {
        // Токен получили, получаем данные пользователя.
        $params = array(
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        );

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);

        $email = $info["email"];
        $name = $info["name"];

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        header('Location: /MyToDo/account/googleAuth');

    }
}
?>