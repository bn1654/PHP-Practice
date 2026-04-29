<div>
    <div class="page-title">
        <h1>Все наши научные руководители</h1>
        <form method="get">
            <input type="text" name='search' placeholder="Поиск...">
        </form>
    </div>
    <?php if(app()->auth::check() && app()->auth::user()->role == 1): ?>
    <a class="add-button" href="<?= app()->route->getUrl('/directors/add') ?>">+ Добавить</a>
    <?php endif; ?>
    <div class="publications">
        <?php
        foreach ($directors as $director)
            {
                echo '<a href=' . app()->route->getUrl("/director?id={$director->directorid}") . '><div class="director">
            <div>
            <h2>' . $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym . '</h2>
            </div>
        </div></a>';
            }
    ?>
</div>
</div>