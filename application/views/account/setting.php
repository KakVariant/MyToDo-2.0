<div class="container container-md d-flex flex-column justify-content-center align-items-center">
        <h2 class="title">Настройки пользователя</h2>
        <div class="container-md d-flex flex-wrap justify-content-around align-items-center">
            <div class="settings-account d-flex flex-column justify-content-center align-items-center">
                <h4 class="sub-title">Настройки аккаунта</h4>
                <div class="group-card d-flex justify-content-around align-items-center">
                    <div class="card card_avatar">
                        <h6 class="name_card">Аватар</h6>
                        <div class="box">
                            <img src="/MyToDo/upload/avatar/<?php echo $_COOKIE['avatar']; ?>" alt="avatar" class="avatar">
                        </div>
                        <form action="/MyToDo/account/changeAvatar" method="POST" class="input__wrapper" enctype="multipart/form-data">
                        <input name="file" type="file" multiple accept="image/jpeg,image/jpg,image/png" name="file" id="input__file" class="input input__file" multiple>
                        <label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper"><i class="fa fa-user profile-icon" aria-hidden="true"></i></span>
                            <span class="input__file-button-text">Выберите аватар</span>
                        </label>
                            <button class="btn-custom" type="submit">Изменить</button>
                        </form>
                    </div>
                    <div class="card card_pass">
                        <h6 class="name_card">Пароль</h6>
                        <i class="fa fa-key icon" aria-hidden="true"></i>
                        <a href="/MyToDo/account/changePass" class="btn-custom">Изменить</a>
                    </div>
                </div>
            </div>
            <div class="discrict"></div>
            <div class="custom d-flex flex-column justify-content-center align-items-center">
                    <h4 class="sub-title">Кастомизация</h4>
                    <div class="group-card d-flex flex-column justify-content-center align-items-center">
                        <div class="card">
                            <h6 class="name_card">Текущая тема</h6>
                            <?php 
                                switch($_COOKIE['theme'])
                                {
                                    case 1:
                                        echo '<img src="/MyToDo/public/images/icon-thm/light_neomorf.svg" alt="theme" class="icon icon-thm">';
                                        break;

                                    case 2:
                                        echo '<img src="/MyToDo/public/images/icon-thm/dark_neomorf.svg" alt="theme" class="icon icon-thm">';
                                        break;

                                    case 3:
                                        echo '<img src="/MyToDo/public/images/icon-thm/adaptive_neomorf.svg" alt="theme" class="icon icon-thm">';
                                        break;
                                }
                            ?>
                            <a href="/MyToDo/theme/show" class="btn-custom">Изменить</a>
                        </div>
                    </div>
            </div>
            <div class="discrict"></div>
            <div class="support d-flex flex-column justify-content-center align-items-center">
                    <h4 class="sub-title">Тех. раздел</h4>
                    <div class="group-card d-flex flex-column justify-content-center align-items-center">
                        <div class="card">
                            <h6 class="name_card">Тех. поддержка</h6>
                            <i class="fa fa-envelope icon" aria-hidden="true"></i>
                            <a href="/MyToDo/report/show" class="btn-custom">Написать</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>