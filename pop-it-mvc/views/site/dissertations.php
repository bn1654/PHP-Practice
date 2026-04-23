<div>
    <div class="page-title">
        <h1>Все диссертации</h1>
        <form method="get">
            <input type="text" placeholder="Поиск...">
        </form>
    </div>
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