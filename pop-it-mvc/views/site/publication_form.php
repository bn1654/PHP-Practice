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
       <label>Издатель <input type="text" name="publisher"><?php 
       if (!empty($errors['publisher'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['publisher'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Автор <input type="text" name="authorid" list="author-data"><?php 
       if (!empty($errors['authorid'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['authorid'])) ?>
        </div>
    <?php endif; ?><datalist id="author-data">
            <?php
        foreach ($authors as $author)
            {
                echo '<option value="' . $author->aspirantid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
</div>
       <div class='inputgr'>
       <label>Дата публикации <input type="date" name="publish_date"><?php 
       if (!empty($errors['publish_date'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['publish_date'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Индекс РИНЦ <input type="number" name="index_RINC"><?php 
       if (!empty($errors['index_RINC'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['index_RINC'])) ?>
        </div>
    <?php endif; ?></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

