<div>
    <div class="page-title">
        <h1>Все наши научные публикации</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Поиск...">
        </form>
    </div>
    <?php if(app()->auth::check() && app()->auth::user()->role == 2): ?>
    <a class="add-button" href="<?= app()->route->getUrl('/publications/add') ?>">+ Добавить</a>
    <?php endif; ?>
    <div class="publications">
    <?php
        foreach ($publications as $publication)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $publication->theme . '</h2>
                    <span>' . $publication->publisher . '</span>
                    <span>Автор:' . $authors[$publication->publicationid]->lastname . ' ' . $authors[$publication->publicationid]->firsname . ' ' . $authors[$publication->publicationid]->patronym . '</span>
                    </div>
                    <div class="down-card">
                    <span>Цитирований в РИНЦ:' . $publication->index_RINC . '</span>
                    <span class="date">' . $publication->publish_date->format('d.m.Y') . '</span>
                    </div>
                </div>';
            }
    ?>
</div>
</div>