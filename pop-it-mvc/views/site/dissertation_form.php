<div>
<h2>Вход</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
   ?>
   <form method="post">
       <label>Тема<input type="firstname" name="firstname"></label>
       <label>Статус <input type="lastname" name="lastname"></label>
       <label>Автор <input type="patronym" name="patronym"></label>
       <label>Дата утверждения <input type="patronym" name="patronym"></label>
       <label>Специальность ВАК <input type="patronym" name="patronym"></label>
       <button>Добавить</button>
   </form>
<?php endif;?>
</div>
