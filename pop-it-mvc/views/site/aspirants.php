<div>
    <div class="page-title">
        <h1>Все наши аспиранты</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Поиск...">
        </form>
    </div>
    <div class="publications">
        <?php
        foreach ($aspirants as $aspirant)
            {
                echo '<div class="aspirant">
            <div>
            <h2>' . $aspirant->lastname . ' ' . $aspirant->firsname . ' ' . $aspirant->patronym . '</h2>
            <span>Научный руководитель:<br>' . $directors[$aspirant->aspirantid]->lastname . ' ' . $directors[$aspirant->aspirantid]->firsname . ' ' . $directors[$aspirant->aspirantid]->patronym . '</span>
            </div>
        </div>';
            }
    ?>
</div>
</div>