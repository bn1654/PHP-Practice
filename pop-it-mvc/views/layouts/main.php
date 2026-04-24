<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pop it MVC</title>
   <link rel="stylesheet" href="../assets/css/main.css">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
   <nav>
    <div>
       <a href="<?= app()->route->getUrl('/') ?>" class="logo">Аспирантура</a>
       <?php
       if (app()->auth::check() && app()->auth::user()->role == 1):
           ?>
           <a href="<?= app()->route->getUrl('/admin') ?>">Пользователи</a>
       
       <?php
       else:
           ?>
           <a href="<?= app()->route->getUrl('/publications') ?>">Публикации</a>
           <a href="<?= app()->route->getUrl('/dissertations') ?>">Диссертации</a>
        <?php
       endif;
       ?>
       <a href="<?= app()->route->getUrl('/directors') ?>">Научные руководители</a>
       <a href="<?= app()->route->getUrl('/aspirants') ?>">Аспиранты</a>
       <?php
       if (app()->auth::check() && app()->auth::user()->role == 2):
           ?>
       <a href="<?= app()->route->getUrl('/reporting') ?>">Отчетность</a>
       <?php
       endif;
       ?>
</div>
       <div>
       <?php
       if (!app()->auth::check()):
           ?>
           <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
       <?php
       else:
           ?>
           <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->login . app()->auth::user()->role ?>)</a>
       <?php
       endif;
       ?>
       </div>
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
