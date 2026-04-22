<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <label>Логин <input type="text" name="login"></label>
   <label>Роль <input type="text" name="name"></label>
   <label>Пароль <input type="password" name="password"></label>
   <label>Повторите пароль <input type="password" name="password"></label>
   <button>Зарегистрировать</button>
</form>
