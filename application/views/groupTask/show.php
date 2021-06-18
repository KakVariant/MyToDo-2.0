<div class="container container-md d-flex flex-column justify-content-center align-items-center">
        <h2 class="title">Группы заданий</h2>
        <div class="container d-flex justify-content-center flex-wrap">

            <?php foreach($list as $val): ?>

            <div class="card-group">
                <div class="name-group <?php if($val['activity'] == 1) echo 'done-group'; ?>">
                    <em><?php echo $val['name']; ?></em>
                </div>
                    <div class="back <?php if($val['activity'] == 1) echo 'done-group'; ?>">
                        <a href="/MyToDo/groupTask/selected/<?php echo $val['id']; ?>" class="btn-done btn-done-group">Выбрать</a>
                        <a data-id="<?php echo $val['id']; ?>" class="btn-delete btn-delete-group" id="btn-delete-group">Удалить</a>
                    </div>
            </div>

            <?php endforeach; ?>
        
            <form action="/MyToDo/groupTask/show" method="POST">
                <button class="card-group" type="submit" name="add">
                    <div class="add-group">
                        <i class="fa fa-plus-square add-icon" aria-hidden="true"></i>
                    </div>
                </button>
            </form>
        </div>
    </div>
    <script src="/MyToDo/public/scripts/refinement.js"></script>