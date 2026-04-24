<div>
    <div>
    <div class="page-title">
        <h1>Управление пользователями</h1>
        
        <form method="get">
            <input type="text" placeholder="Поиск...">
        </form>
    </div>
    <a class="add-button" href="<?= app()->route->getUrl('/signup') ?>">+ Добавить</a>
</div>
        
    <div class="publications">
     <?php   foreach($users as $user){
     echo '<div class="user">
            <div>
            <h2>' . $user->login . '</h2>
            <span>Роль: ' . $roles[$user->userid]->name . '</span>
            </div>
        </div>'; } 
        ?>
</div>
</div>