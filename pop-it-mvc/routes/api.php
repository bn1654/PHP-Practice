<?php

use Src\Route;

Route::add('GET', '/', [Controller\ApiController::class, 'index']);
Route::add('POST', '/auth/', [Controller\ApiController::class, 'auth']);
Route::add('POST', '/echo/', [Controller\ApiController::class, 'echo']);
Route::add('GET', '/reports/', [Controller\ApiController::class, 'reports']);