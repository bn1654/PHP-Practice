<div class="form-wrap">
<div class="add-form">
<h2>Добавить научного руководителя</h2>
<h3><?= $message ?? ''; ?></h3>
   <form method="post">
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class='inputgr'>
       <label>Имя <input type="text" name="firsname"></label>
       <label>Фамилия <input type="text" name="lastname"></label>
       <label>Отчество <input type="text" name="patronym"></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

