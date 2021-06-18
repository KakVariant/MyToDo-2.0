<h1 class="title">Выбор темы</h1>
    <div class="container-sm d-flex flex-wrap justify-content-center">
        <a href="/MyToDo/theme/select/1" class="card-thm">
            <img class="thm-img <?php if($_COOKIE['theme'] == 1) echo 'done-thm'; ?>" src="/MyToDo/public/images/icon-thm/light_neomorf.svg" alt="Адаптивная тема">
        </a>
        <a href="/MyToDo/theme/select/2" class="card-thm">
            <img class="thm-img <?php if($_COOKIE['theme'] == 2) echo 'done-thm'; ?>" src="/MyToDo/public/images/icon-thm/dark_neomorf.svg" alt="Адаптивная тема">
        </a>
        <a href="/MyToDo/theme/select/3" class="card-thm">
            <img class="thm-img <?php if($_COOKIE['theme'] == 3) echo 'done-thm'; ?>" src="/MyToDo/public/images/icon-thm/adaptive_neomorf.svg" alt="Адаптивная тема">
        </a>
    </div>

    <!-- done-thm -->