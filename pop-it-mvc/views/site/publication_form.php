<div class="form-wrap">
<div class="add-form">
<h2>Добавить научную публикацию</h2>
<h3><?= $message ?? ''; ?></h3>
   <form method="post">
       <div class='inputgr'>
       <label>Название<input type="text" name="theme"></label>
</div>
       <div class='inputgr'>
       <label>Издатель <input type="text" name="publisher"></label>
       <label>Автор <input type="text" name="authorid" list="author-data"><datalist id="author-data">
            <?php
        foreach ($authors as $author)
            {
                echo '<option value="' . $author->aspirantid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
</div>
       <div class='inputgr'>
       <label>Дата публикации <input type="date" name="publish_date"></label>
       <label>Индекс РИНЦ <input type="number" name="index_RINC"></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

