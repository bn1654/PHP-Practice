<div class="form-wrap">
<div class="add-form">
<h2>Добавить диссертацию</h2>
<h3><?= $message ?? ''; ?></h3>

   <form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class='inputgr'>
       <label>Тема<input type="text" name="theme"></label>
</div>
       <div class='inputgr'>
       <label>Статус <select name="status">
            <?php
        foreach ($statuses as $status)
            {
                echo '<option value="' . $status->statusid . '">' . $status->name . '</option>';
            }
        ?>
</select></label>

       <label>Автор <input type="text" name="authorid" list="author-data">
    <datalist id="author-data">
            <?php
        foreach ($authors as $author)
            {
                echo '<option value="' . $author->aspirantid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
</div>

       <div class='inputgr'>
       <label>Дата утверждения <input type="date" name="date"></label>
       <label>Специальность ВАК <select name="vak">
         <option value="1.5.9 Ботаника">1.5.9 Ботаника</option>
       </select></label>
</div>

       <button>Добавить</button>
   </form>
</div>
