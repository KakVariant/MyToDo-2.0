<div class="container-sm">
        <h1 class="title">Задачи в группе "<?php echo $name_group[0]['name']; ?>")</h1>

        <form class="container-add" method="post">
            <input autocomplete="off" maxlength="50" type="text" class="input-text input-add" name="task" placeholder="Добавить новую задачу" aria-describedby="button-addon2">
            <button type="submit" class="btn-add" data-toggle="modal" name="add_medium" data-target="#exampleModal">Добавить</button>
</form>

        <?php if(!empty($lowTask)): ?>

            <div class="priority">
                <div class="horis-line"></div>
                <div class="name_card">Слабый приоритет</div>
                <div class="horis-line"></div>
            </div>

            <?php foreach ($lowTask as $val): ?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center task">
                        <a href="/MyToDo/todo/done/<?php echo $val['id']; ?>" class="btn-done"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <div class="font-weight-bold"><em><?php echo htmlspecialchars($val['task'], ENT_QUOTES); ?></em></div>
                        <a class="btn-delete" href="/MyToDo/todo/delete/<?php echo $val['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>




        <?php if(!empty($mediumTask)): ?>

            <div class="priority">
                <div class="horis-line"></div>
                <div class="name_card">Средний приоритет</div>
                <div class="horis-line"></div>
            </div>

            <?php foreach ($mediumTask as $val): ?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center task">
                        <a href="/MyToDo/todo/done/<?php echo $val['id']; ?>" class="btn-done"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <div class="font-weight-bold"><em><?php echo htmlspecialchars($val['task'], ENT_QUOTES); ?></em></div>
                        <a class="btn-delete" href="/MyToDo/todo/delete/<?php echo $val['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>




        <?php if(!empty($highTask)): ?>

            <div class="priority">
                <div class="horis-line"></div>
                <div class="name_card">Высокий приоритет</div>
                <div class="horis-line"></div>
            </div>

            <?php foreach ($highTask as $val): ?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center task">
                        <a href="/MyToDo/todo/done/<?php echo $val['id']; ?>" class="btn-done"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <div class="font-weight-bold"><em><?php echo htmlspecialchars($val['task'], ENT_QUOTES); ?></em></div>
                        <a class="btn-delete" href="/MyToDo/todo/delete/<?php echo $val['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>




        <?php if(!empty($doneTask)): ?>

            <div class="priority">
                <div class="horis-line"></div>
                <div class="name_card">Выполненые задачи</div>
                <div class="horis-line"></div>
            </div>

            <?php foreach ($doneTask as $val): ?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center task">
                        <a href="/MyToDo/todo/done/<?php echo $val['id']; ?>" class="btn-done done-todo"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <div class="font-weight-bold"><em><s><?php echo htmlspecialchars($val['task'], ENT_QUOTES); ?></s></em></div>
                        <a class="btn-delete" href="/MyToDo/todo/delete/<?php echo $val['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>