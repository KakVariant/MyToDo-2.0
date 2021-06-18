<h1 class="title">Восстановление пароля</h1>
    <div class="container-sm d-flex justify-content-center">
        <form class="d-flex flex-column justify-content-center" action="/MyToDo/account/recoveryPass" method="POST">
            <label for="email" class="label">Введите Ваш Email</label>
            <input type="email" class="input-text" size="32px" autocomplete="off" id="email" name="email" placeholder="Email">
            <br />
            <button type="submit" class="btn btn-custom">Восстановить</button>
            <br />
            <div class="d-flex justify-content-end notes">
        Вернуться на страницу&nbsp;
        <a href="/MyToDo/account/login">входа</a>
    </div>
        </form>
    </div>