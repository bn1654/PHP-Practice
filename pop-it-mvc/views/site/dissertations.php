<div>
    <div class="page-title">
        <h1>Все диссертации</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Поиск...">
        </form>
    </div>
    <?php if(app()->auth::check() && app()->auth::user()->role == 2): ?>
    <a class="add-button" href="<?= app()->route->getUrl('/dissertations/add') ?>">+ Добавить</a>
    <?php endif; ?>
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