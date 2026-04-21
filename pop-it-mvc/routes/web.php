<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\SiteController::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);

