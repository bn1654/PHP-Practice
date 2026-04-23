<div class="form-wrap">
<div class="add-form">
<h2>Добавить научную публикацию</h2>
<h3><?= $message ?? ''; ?></h3>
   <form method="post">
       <div class='inputgr'>
       <label>Название<input type="text" name="name"></label>
</div>
       <div class='inputgr'>
       <label>Издатель <input type="text" name="publisher"></label>
       <label>Автор <input type="text" name="author"></label>
</div>
       <div class='inputgr'>
       <label>Дата публикации <input type="date" name="public_date"></label>
       <label>Индекс РИНЦ <input type="number" name="RINC"></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

