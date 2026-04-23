<div>
    <div class="page-title">
        <h1>Все наши научные руководители</h1>
        <form method="get">
            <input type="text" placeholder="Поиск...">
        </form>
    </div>
    <div class="publications">
        <?php
        foreach ($directors as $director)
            {
                echo '<div class="director">
            <div>
            <h2>' . $director->lastname . ' ' . $director->firsname . ' ' . $director->patronym . '</h2>
            <span>Аспирантов: 8</span>
            </div>
        </div>';
            }
    ?>
</div>
</div>