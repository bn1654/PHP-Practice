<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pop it MVC</title>
</head>
<body>
<header>
   <nav>
       <a href="<?= app()->route->getUrl('/hello') ?>">Аспирантура</a>
       <a href=#>Публикации</a>
       <a href=#>Диссертации</a>
       <a href=#>Научные руководители</a>
       <a href=#>Аспиранты</a>
       <a href=#>Отчетность</a>
       <?php
       if (!app()->auth::check()):
           ?>
           <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
       <?php
       else:
           ?>
           <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
       <?php
       endif;
       ?>
   </nav>
</header>
<main>
   <?= $content ?? '' ?>
</main>

<footer>
    Сайт аспирантуры для практики
</footer>

</body>
</html>
