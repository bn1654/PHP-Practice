<div class="form-wrap">
<div class="add-form">
<h2>Добавить диссертацию</h2>
<h3><?= $message ?? ''; ?></h3>

   <form method="post">
    <div class='inputgr'>
       <label>Тема<input type="text" name="theme"></label>
</div>
       <div class='inputgr'>
       <label>Статус <input type="text" name="status" list="status">
    <datalist id="status">
            <option value="Иван Иванович Иванов"></option>
            <option value="Иван Иванович Иванов"></option>
        </datalist></label>

       <label>Автор <input type="text" name="author" list="author-data">
    <datalist id="author-data">
            <option value="Иван Иванович Иванов"></option>
            <option value="Иван Иванович Иванов"></option>
        </datalist></label>
</div>

       <div class='inputgr'>
       <label>Дата утверждения <input type="date" name="patronym"></label>
       <label>Специальность ВАК <input type="text" name="patronym"></label>
</div>

       <button>Добавить</button>
   </form>
</div>
