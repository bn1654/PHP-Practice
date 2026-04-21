<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\SiteController::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\SiteController::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\SiteController::class, 'login']);
Route::add('GET', '/logout', [Controller\SiteController::class, 'logout']);

