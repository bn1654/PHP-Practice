<div class="form-wrap">
<div class="add-form">
<h2>Добавить диссертацию</h2>
<?php 
    $errors = json_decode($message ?? '{}', true);
    $old = $_POST ?? [];?>

   <form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class='inputgr'>
       <label>Тема<input type="text" name="theme"><?php 
       if (!empty($errors['theme'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['theme'])) ?>
        </div>
    <?php endif; ?></label>
</div>
       <div class='inputgr'>
       

       <label>Аспирант <input type="text" name="aspirant" list="aspirant-data"><?php 
       if (!empty($errors['aspirant'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['aspirant'])) ?>
        </div>
    <?php endif; ?>
    <datalist id="aspirant-data">
            <?php
        foreach ($authors as $author)
            {
                echo '<option value="' . $author->aspirantid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
        <label>Научный руководитель <input type="text" name="director" list="director-data"><?php 
       if (!empty($errors['director'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['director'])) ?>
        </div>
    <?php endif; ?>
    <datalist id="director-data">
            <?php
        foreach ($directors as $author)
            {
                echo '<option value="' . $author->directorid . ' - ' . $author->firsname . ' ' . $author->patronym . ' ' . $author->lastname . '"></option>';
            }
        ?>
        </datalist></label>
</div>

       <div class='inputgr'>
       
       <label>Специальность ВАК <select name="vak">
         <option value="1.5.9 Ботаника">1.5.9 Ботаника</option>
       </select><?php 
       if (!empty($errors['vak'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['vak'])) ?>
       </div>
    <?php endif; ?></label>
    <label>Статус <select name="status">
            <?php
        foreach ($statuses as $status)
            {
                echo '<option value="' . $status->statusid . '">' . $status->name . '</option>';
            }
        ?>
</select><?php 
       if (!empty($errors['status'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['status'])) ?>
        </div>
    <?php endif; ?></label>
</div>
<label>Дата утверждения <input type="date" name="date"><?php 
       if (!empty($errors['date'])): ?>
        <div class="error-message">
            <?= htmlspecialchars(implode(', ', $errors['date'])) ?>
        </div>
    <?php endif; ?></label>

       <button>Добавить</button>
   </form>
</div>
