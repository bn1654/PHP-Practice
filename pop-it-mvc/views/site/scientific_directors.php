<div>
    <div class="page-title">
        <h1>Все наши научные руководители</h1>
        <form method="get">
            <input type="text" name='search' placeholder="Поиск...">
        </form>
    </div>
    <div class="publications">
        <?php
        foreach ($directors as $director)
            {
                echo '<a href=' . app()->route->getUrl("/director?id={$director->directorid}") . '><div class="director">
            <div>
            <h2>' . $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym . '</h2>
            <span>Аспирантов:' . $director->get_aspirants_count() . '</span>
            </div>
        </div></a>';
            }
    ?>
</div>
</div>