<div>
    <div class="page-title">
        <?php $old = $_GET ?? [];?>
        <h1>Все наши аспиранты</h1>
        <form method="get">
            <label>Поиск по: <select name="search_settings">
         <option value="1">ФИО</option>
         <option value="2">По научному руководителю</option>
       </select></label>
            <input type="text" name="search" placeholder="Поиск..." value="<?= htmlspecialchars($old['search'] ?? '') ?>">
        </form>
    </div>
    <?php if(app()->auth::check() && app()->auth::user()->role == 1): ?>
    <a class="add-button" href="<?= app()->route->getUrl('/aspirants/add') ?>">+ Добавить</a>
    <?php endif; ?>
    <div class="publications">
        <?php
        foreach ($aspirants as $aspirant)
            {
                echo '<a href=' . app()->route->getUrl("/aspirant?id={$aspirant->aspirantid}") . '><div class="aspirant">
            <h2>' . $aspirant->lastname . ' ' . $aspirant->firsname . ' ' . $aspirant->patronym . '</h2>
        </div></a>';
            }
    ?>
</div>
</div>