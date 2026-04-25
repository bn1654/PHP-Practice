<div class="form-wrap">
<div class="add-form">
<h2>Регистрация нового пользователя</h2>
<?php 
    $errors = json_decode($message ?? '{}', true);
    $old = $_POST ?? [];?>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
   <div class='inputgr'>
   <label>Логин <input type="text" name="login"><?php 
       if (!empty($errors['login'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['login'])) ?>
        </div>
    <?php endif; ?></label>
   <label>Роль <select name="role">
            <?php
        foreach ($roles as $role)
            {
                echo '<option value="' . $role->roleid . '">' . $role->name . '</option>';
            }
        ?>
</select><?php 
       if (!empty($errors['role'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['role'])) ?>
        </div>
    <?php endif; ?></label>
</div>
   <div class='inputgr'>
   <label>Пароль <input type="password" name="password"><?php 
       if (!empty($errors['password'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['password'])) ?>
        </div>
    <?php endif; ?></label>
   <label>Повторите пароль <input type="password" name="password2"><?php 
       if (!empty($errors['password2'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['password2'])) ?>
        </div>
    <?php endif; ?></label>
</div>
   <button>Зарегистрировать</button>
</form>
</div>
</div>
