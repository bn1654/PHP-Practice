<div class="form-wrap">
<div class="add-form">
<h2>Добавить научную публикацию</h2>
<?php 
    $errors = json_decode($message ?? '{}', true);
    $old = $_POST ?? [];?>
   <form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
       <div class='inputgr'>
       <label>Название<input type="text" name="theme"><?php 
       if (!empty($errors['theme'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['theme'])) ?>
        </div>
    <?php endif; ?></label>
</div>
       <div class='inputgr'>
       
       <label>Автор <input type="text" name="author" list="author-data"><?php 
       if (!empty($errors['author'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['author'])) ?>
        </div>
    <?php endif; ?><datalist id="author-data">
            <?php
        foreach ($authors as $author)
            {
                echo '<option value="' . $author->aspirantid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
        <label>Соавтор <input type="text" name="coauthor" list="coauthor-data"><?php 
       if (!empty($errors['coauthor'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['coauthor'])) ?>
        </div>
    <?php endif; ?><datalist id="coauthor-data">
            <?php
        foreach ($coauthors as $author)
            {
                echo '<option value="' . $author->directorid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>

</div>
       <div class='inputgr'>
       
    <label>Издатель <input type="text" name="publisher"><?php 
       if (!empty($errors['publisher'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['publisher'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Индекс РИНЦ <input type="number" name="index_RINC"><?php 
       if (!empty($errors['index_RINC'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['index_RINC'])) ?>
        </div>
    <?php endif; ?></label>
</div>
<label>Дата публикации <input type="date" name="publish_date"><?php 
       if (!empty($errors['publish_date'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['publish_date'])) ?>
        </div>
    <?php endif; ?></label>
       <button>Добавить</button>
   </form>
</div>
</div>

