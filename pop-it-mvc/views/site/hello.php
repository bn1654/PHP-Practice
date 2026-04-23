<div class="recomendations">
<div>
    <h1>Последние опубликованные научные работы</h1>
    <div class="posts">
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
    <div>
    <h1>Наши научные руководители</h1>
    <div class="directors">
        <?php
        foreach ($directors as $director)
            {
                echo '<div class="director">
            <div>
            <h2>' . $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym . '</h2>
            <span>Аспирантов:' . $director->get_aspirants_count() . '</span>
            </div>
        </div>';
            }
    ?>
    </div>
    </div>
</div>
