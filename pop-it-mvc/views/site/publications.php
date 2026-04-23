<div>
    <div class="page-title">
        <h1>Все наши научные публикации</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Поиск...">
        </form>
    </div>
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
                    <span class="date">' . $publication->publish_date . '</span>
                    </div>
                </div>';
            }
    ?>
</div>
</div>