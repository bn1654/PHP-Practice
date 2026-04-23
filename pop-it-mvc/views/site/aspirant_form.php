<div class="form-wrap">
<div class="add-form">
<h2>Добавить аспиранта</h2>

   <form method="post">
        <div class='inputgr'>
       <label>Имя <input type="text" name="firsname"></label>
       <label>Фамилия <input type="text" name="lastname"></label>
       <label>Отчество <input type="text" name="patronym"></label>
</div>
       <label>Научный руководитель <input type="text" name="director" list="data">
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