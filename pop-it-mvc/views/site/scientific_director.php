<div>
    <div class="person-info">
        <div>
        <h1><?php echo $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym ?></h1>
        <span>Научный руководитель</span>
        </div>
        <div class="statistic">
            <?php
            echo '<span>Научные публикации аспирантов: ' . $publications->count() .'</span>
            <span>Успешные защиты аспирантов: ' . $dissertations->where('status', 3)->count() .'</span>
           <span> Аспирантов: ' . $director->get_aspirants_count() .'</span>'
           ?>
        </div>
    </div>
<h2 class="section-h">Аспиранты</h2>
    <div class="publications">
    <?php
        foreach ($aspirants as $aspirant)
            {
                echo '<div class="aspirant">
            <div>
            <h2>' . $aspirant->lastname . ' ' . $aspirant->firsname . ' ' . $aspirant->patronym . '</h2>
            <span>Научный руководитель:<br>' . $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym . '</span>
            </div>
        </div>';
            }
    ?>
</div>
<h2 class="section-h">Научные публикации аспирантов</h2>
<div class="publications">
    <?php
        foreach ($publications as $publication)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $publication->theme . '</h2>
                    <span>' . $publication->publisher . '</span>
                    <span>Автор:' . $authors_pub[$publication->publicationid]->lastname . ' ' . $authors_pub[$publication->publicationid]->firsname . ' ' . $authors_pub[$publication->publicationid]->patronym . '</span>
                    </div>
                    <div class="down-card">
                    <span>Цитирований в РИНЦ:' . $publication->index_RINC . '</span>
                    <span class="date">' . $publication->publish_date->format('d.m.Y') . '</span>
                    </div>
                </div>';
            }
    ?>
</div>
<h2 class="section-h">Диссертации аспирантов</h2>
<div class="publications">
    <?php
        foreach ($dissertations as $disertation)
            {
                echo '<div class="post">
                    <div class="up-card">
                    <h2>' . $disertation->theme . '</h2>
                    <span>' . $statuses[$disertation->dissertationid]->name . '</span>
                    <span>Автор:' . $authors_dis[$disertation->dissertationid]->lastname . ' ' . $authors_dis[$disertation->dissertationid]->firsname . ' ' . $authors_dis[$disertation->dissertationid]->patronym . '</span>
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