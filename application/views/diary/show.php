<h1 class="title">Дневник</h1>
    <div class="container-sm d-flex flex-column justify-content-center">
        <form class="container-add" action="/MyToDo/diary/show" method="POST">
            <input autocomplete="off" maxlength="50" type="text" class="input-text input-add" name="title" placeholder="Добавить новую запись" aria-describedby="button-addon2">
            <button class="btn-add" name="add" type="submit">Добавить</button>
        </form>
        <form action="/MyToDo/diary/show" method="POST">
            <div class="container-add container-sort">
                <select onchange='isDate(this)' class="input-text input-sort" name="select-sort" id="select-sort">
                    <option <?php if (!strcmp($_COOKIE["sort"], "all")) {echo "selected";} ?> value="all">Показать все записи</option>
                    <option <?php if (!strcmp($_COOKIE["sort"], "mark")) {echo "selected";} ?> value="mark">Показать только избранные записи</option>
                    <option <?php if (!strcmp($_COOKIE["sort"], "day")) {echo "selected";} ?> value="day">Показать записи за определённый день</option>
                </select>
                <input class="inpDate <?php if (strcmp($_COOKIE["sort"], "day")) {echo "date-visab";} ?>" name="inpDate" type="date" id="inpDate" value="<?php echo $_COOKIE['date-sf']; ?>" min="2001-08-07" max="<?php echo $_COOKIE['date-sf']; ?>">
                <button class="btn-add" name="sort" type="submit">Сортировать</button>
            </div>
        </form>
        <div class="list-diary list-group">
        <?php foreach($list as $val): ?>
            <a class="note <?php if($val['activity'] == 1) echo 'mark-note'; ?> list-group-item d-flex flex-column" id="note" data-id="<?php echo $val['id']; ?>">
                <div class="title-note d-flex flex-row justify-content-between" id="note" data-id="<?php echo $val['id']; ?>">
                    <div class="title-notes" id="note" data-id="<?php echo $val['id']; ?>">
                    <?php echo $val['title']; ?>
                    </div>
                    <div class="date-notes" id="note" data-id="<?php echo $val['id']; ?>">
                    <?php echo $val['time']; ?> | <?php echo $val['date']; ?>
                    </div>
                </div>
                <div class="desc-note" id="note" data-id="<?php echo $val['id']; ?>">
                <?php echo $val['description']; ?>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </div>

    <script src="/MyToDo/public/scripts/diary.js" type="text/javascript"></script>