<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\SiteController::class, 'hello']);
Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);
Route::add('GET', '/aspirants', [Controller\SiteController::class, 'aspirants']);

