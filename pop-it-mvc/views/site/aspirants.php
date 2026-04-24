<div>
    <div class="page-title">
        <h1>Все наши аспиранты</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Поиск...">
        </form>
    </div>
    <?php if(app()->auth::check() && app()->auth::user()->role == 1): ?>
    <a class="add-button" href="<?= app()->route->getUrl('/aspirants/add') ?>">+ Добавить</a>
    <?php endif; ?>
    <div class="publications">
        <?php
        foreach ($aspirants as $aspirant)
            {
                echo '<a href=' . app()->route->getUrl("/aspirant?id={$aspirant->aspirantid}") . '><div class="aspirant">
            <div>
            <h2>' . $aspirant->lastname . ' ' . $aspirant->firsname . ' ' . $aspirant->patronym . '</h2>
            <span>Научный руководитель:<br>' . $directors[$aspirant->aspirantid]->lastname . ' ' . $directors[$aspirant->aspirantid]->firsname . ' ' . $directors[$aspirant->aspirantid]->patronym . '</span>
            </div>
        </div></a>';
            }
    ?>
</div>
</div>