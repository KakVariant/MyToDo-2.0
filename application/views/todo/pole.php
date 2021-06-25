<body class="body">
<a href="/MyToDo/index.php" class="btn btn-outline-light exit-btn">X</a>
<div class="container-sm d-flex justify-content-center title-text">
    <div class="title-letter letter">П</div>
    <div class="title-letter letter">о</div>
    <div class="title-letter letter">л</div>
    <div class="title-letter letter">е</div>
    <div class="title-letter letter space"> </div>
    <div class="title-letter letter">ч</div>
    <div class="title-letter letter">у</div>
    <div class="title-letter letter">д</div>
    <div class="title-letter letter">е</div>
    <div class="title-letter letter">с</div>
</div>
<div class="d-flex justify-content-around container-body">
    <div class="container-sm d-flex justify-content-center">
        <canvas id="canvas" onclick="go()"></canvas>
    </div>
    <div class="container-sm d-flex flex-column justify-content-center">
        <div class="title d-flex">
            <div class="text-letter letter">Д</div>
            <div class="text-letter letter">о</div>
            <div class="text-letter letter">б</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">в</div>
            <div class="text-letter letter">и</div>
            <div class="text-letter letter">т</div>
            <div class="text-letter letter">ь</div>
            <div class="text-letter letter space"></div>
            <div class="text-letter letter">з</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">д</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">ч</div>
            <div class="text-letter letter">у</div>
        </div>
        <div class="content">
            <div class="custom-text">
                <div class="input-group mb-3">
                    <input autocomplete="off" maxlength="15" type="text" id="task" class="form-control" name="task" placeholder="Добавить новую задачу" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a class="btn btn-secondary" data-toggle="modal" onclick="add()" name="add_medium" data-target="#exampleModal">Добавить</a>
                    </div>
                </div>
            </div>

            <div class="title d-flex res-title">
                <div class="text-letter letter">Р</div>
                <div class="text-letter letter">е</div>
                <div class="text-letter letter">з</div>
                <div class="text-letter letter">у</div>
                <div class="text-letter letter">л</div>
                <div class="text-letter letter">ь</div>
                <div class="text-letter letter">т</div>
                <div class="text-letter letter">а</div>
                <div class="text-letter letter">т</div>
                <div class="text-letter letter">:</div>
            </div>

            <div class="result d-flex justify-content-between">
                <div class="dummy-done">✓</div>
                <div class="result-text"><em id="result">Test</em></div>
                <div class="dummy-delete">X</div>
            </div>

            <div class="add-task">
                <button type="button" onclick="addTask()" class="btn btn-secondary btn-lg btn-block btn-add-task">Добавить задачу в MyToDo</button>
            </div>
        </div>
    </div>
    <img class="yakybovich" src="/MyToDo/public/images/yakybovich.png" alt="Крутите барабан!">
    <script src="/MyToDo/public/scripts/pole.js"></script>
</body>