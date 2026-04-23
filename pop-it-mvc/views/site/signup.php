<div class="form-wrap">
<div class="add-form">
<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <div class='inputgr'>
   <label>Логин <input type="text" name="login"></label>
   <label>Роль <input type="text" name="name"></label>
</div>
   <div class='inputgr'>
   <label>Пароль <input type="password" name="password"></label>
   <label>Повторите пароль <input type="password" name="password"></label>
</div>
   <button>Зарегистрировать</button>
</form>
</div>
</div>
