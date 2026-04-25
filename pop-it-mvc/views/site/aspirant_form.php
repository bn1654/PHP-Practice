<div class="form-wrap">
<div class="add-form">
<h2>Добавить аспиранта</h2>
<?php 
    $errors = json_decode($message ?? '{}', true);
    $old = $_POST ?? [];?>


   <form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class='inputgr'>
       <label>Имя <input type="text" value='<?= htmlspecialchars($old['firsname'] ?? '') ?>' name="firsname"><?php 
       if (!empty($errors['firsname'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['firsname'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Фамилия <input type="text" name="lastname" value='<?= htmlspecialchars($old['lastname'] ?? '') ?>'><?php 
       if (!empty($errors['lastname'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['lastname'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Отчество <input type="text" name="patronym" value='<?= htmlspecialchars($old['patronym'] ?? '') ?>'><?php 
       if (!empty($errors['patronym'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['patronym'])) ?>
        </div>
    <?php endif; ?></label>
</div>
       <label>Научный руководитель <input type="text" name="director" list="data"><?php 
       if (!empty($errors['director'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['director'])) ?>
        </div>
    <?php endif; ?>
       <datalist id="data">
        <?php
        foreach ($directors as $director)
            {
                echo '<option value="' . $director->directorid . ' - ' . $director->firsname . ' ' . $director->patronym . ' ' . $director->lastname . '"></option>';
            }
        ?>
        </datalist></label>
       <button>Добавить</button>
   </form>
</div>
</div>