<div>

    <h1>Отчетность за все время</h1>
    <div class="page-title">
        <h1>Количество защищенных работ: <?= $dissertations->count() ?></h1>
        <form method="get">
            <label>Научный руководитель: <input type="text" name="director" placeholder="Поиск..."></label>
            <button><img src="../assets/img/search_button.svg"></button>
        </form>
    </div>
    <div>
    <div class="publications">
     <?php
        foreach ($dissertations as $disertation)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $disertation->theme . '</h2>
                    <span>' . $statuses[$disertation->dissertationid]->name . '</span>
                    <span>Автор:' . $authors[$disertation->dissertationid]->lastname . ' ' . $authors[$disertation->dissertationid]->firsname . ' ' . $authors[$disertation->dissertationid]->patronym . '</span>
                    </div>
                    <div class="down-card">
                    <span>Специальность:' . $disertation->vak . '</span>
                    <span class="date"> Утверждено ' . $disertation->date . '</span>
                    </div>
                </div>';
            }
    ?>
</div>
</div>
</div>