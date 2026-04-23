<?php

use Src\Route;

Route::add ('GET', '/', [Controller\SiteController::class, 'index']);

Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);

Route::add('GET', '/aspirants', [Controller\SiteController::class, 'aspirants']);

Route::add('GET', '/publications', [Controller\PublicationsController::class, 'all']);
Route::add('GET', '/publications/add', [Controller\PublicationsController::class, 'add']);

