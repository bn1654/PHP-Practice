<div>
    <div class="person-info">
        <div>
        <h1><?= $aspirant->lastname . ' ' . $aspirant->firsname . ' ' . $aspirant->patronym ?></h1>
        <span>Аспирант</span>
        </div>
        <div class="statistic">
            <?php
            echo '
            <span>Научные публикации: ' . $publications->count() .'</span>
            <span>Диссертации: ' . $dissertations->count() .'</span>
        </div>'
        ?>
    </div>
<h2 class="section-h">Научные публикации</h2>
<div class="publications">
    <?php
        foreach ($publications as $publication)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $publication->theme . '</h2>
                    <span>' . $publication->publisher . '</span>
                    <span>Автор:' . $authors_pub[$publication->publicationid]->lastname . ' ' . $authors_pub[$publication->publicationid]->firsname . ' ' . $authors_pub[$publication->publicationid]->patronym . '</span>
                    <span>Совтор:' . $coauthors_pub[$publication->publicationid]->lastname . ' ' . $coauthors_pub[$publication->publicationid]->firsname . ' ' . $coauthors_pub[$publication->publicationid]->patronym . '</span>
                    </div>
                    <div class="down-card">
                    <span>Цитирований в РИНЦ:' . $publication->index_RINC . '</span>
                    <span class="date">' . $publication->publish_date->format('d.m.Y') . '</span>
                    </div>
                </div>';
            }
    ?>
</div>
<h2 class="section-h">Диссертации</h2>
<div class="publications">
    <?php
        foreach ($dissertations as $disertation)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $disertation->theme . '</h2>
                    <span>' . $statuses[$disertation->dissertationid]->name . '</span>
                    <span>Автор:' . $authors_dis[$disertation->dissertationid]->lastname . ' ' . $authors_dis[$disertation->dissertationid]->firsname . ' ' . $authors_dis[$disertation->dissertationid]->patronym . '</span>
                    <span>Научный руководитель:' . $coauthors_dis[$disertation->dissertationid]->lastname . ' ' . $coauthors_dis[$disertation->dissertationid]->firsname . ' ' . $coauthors_dis[$disertation->dissertationid]->patronym . '</span>
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