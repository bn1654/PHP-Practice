<div class="form-wrap">
<div class="add-form">
<h2>Добавить научного руководителя</h2>
<?php 
    $errors = json_decode($message ?? '{}', true);
    $old = $_POST ?? [];?>
   <form method="post">
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class='inputgr'>
       <label>Имя <input type="text" name="firsname"><?php 
       if (!empty($errors['firsname'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['firsname'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Фамилия <input type="text" name="lastname"><?php 
       if (!empty($errors['lastname'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['lastname'])) ?>
        </div>
    <?php endif; ?></label>
       <label>Отчество <input type="text" name="patronym"><?php 
       if (!empty($errors['patronym'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['patronym'])) ?>
        </div>
    <?php endif; ?></label>
</div>
       <button>Добавить</button>
   </form>
</div>
</div>

