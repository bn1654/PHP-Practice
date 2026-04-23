<div class="form-wrap">
<div class="add-form">
<h2>Добавить научного руководителя</h2>
<h3><?= $message ?? ''; ?></h3>
   <form method="post">
    <div class='inputgr'>
       <label>Имя <input type="firstname" name="firstname"></label>
       <label>Фамилия <input type="lastname" name="lastname"></label>
       <label>Отчество <input type="patronym" name="patronym"></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

