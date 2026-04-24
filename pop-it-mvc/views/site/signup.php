<div class="form-wrap">
<div class="add-form">
<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
   <div class='inputgr'>
   <label>Логин <input type="text" name="login"></label>
   <label>Роль <select name="role">
            <?php
        foreach ($roles as $role)
            {
                echo '<option value="' . $role->roleid . '">' . $role->name . '</option>';
            }
        ?>
</select></label>
</div>
   <div class='inputgr'>
   <label>Пароль <input type="password" name="password"></label>
   <label>Повторите пароль <input type="password" name="password2"></label>
</div>
   <button>Зарегистрировать</button>
</form>
</div>
</div>
