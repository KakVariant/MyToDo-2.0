<h1 class="title">Смена пароля</h1>
    <div class="container-sm d-flex justify-content-center">
        <form class="d-flex flex-column justify-content-center" action="/MyToDo/account/changePass" method="POST">
            <label for="oldPassword" class="label">Введите старый пароль</label>
            <input type="password" class="input-text" size="32px" autocomplete="off" id="oldPassword" name="oldPassword" placeholder="Старый пароль">
            <br />
            <label for="newPassword" class="label">Введите новый пароль</label>
            <input type="password" class="input-text" size="32px" autocomplete="off" id="newPassword" name="newPassword" placeholder="Новый пароль">
            <br />
            <label for="replacePassword" class="label">Повторите новый пароль</label>
            <input type="password" class="input-text" size="32px" autocomplete="off" id="replacePassword" name="replacePassword" placeholder="Новый пароль">
            <br />
            <button type="submit" class="btn btn-custom">Сменить</button>

            <div class="d-flex justify-content-end notes">
                <a href="/MyToDo">На главую</a>
            </div>
        </form>
    </div>