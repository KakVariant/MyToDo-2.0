<h1 class="title">Регистрация в My ToDo</h1>
    <div class="container-sm d-flex justify-content-center">
        <form class="d-flex flex-column justify-content-center" action="/MyToDo/account/register" method="POST">
            <label for="email" class="label">Введите Ваш email</label>
            <input type="email" class="input-text" size="32px" autocomplete="off" id="email" name="email" placeholder="Email">
            <br />
            <label for="name" class="label">Введите имя</label>
            <input type="text" class="input-text" size="32px" autocomplete="off" id="name" name="name" placeholder="Имя">
            <br />
            <label for="pass" class="label">Придумайте пароль</label>
            <input type="password" class="input-text" size="32px" autocomplete="off" id="pass" maxlength="8" name="pass" placeholder="Пароль">
            <br />
            <button type="submit" class="btn btn-custom btn-reg">Регистрация</button>
        </form>
    </div>