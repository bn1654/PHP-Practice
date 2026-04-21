<?php
//Включаем запрет на неявное преобразование типов
declare(strict_types=1);

session_start();

try {
   require __DIR__ . '/../../vendor/autoload.php';
   if (!class_exists('FastRoute\RouteCollector')) {
    die('FastRoute not loaded. Include path: ' . get_include_path());
   }
   $app = require_once __DIR__ . '/../core/bootstrap.php';
   $app->run();
} catch (\Throwable $exception) {
   echo '<pre>';
   print_r($exception);
   echo '</pre>';
}
