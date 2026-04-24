<?php

use Src\Route;

Route::add ('GET', '/', [Controller\SiteController::class, 'index']);

Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup'])
->middleware('is_admin');
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout'])->middleware('auth');

Route::add('GET', '/publications', [Controller\PublicationsController::class, 'all']);
Route::add(['GET', 'POST'], '/publications/add', [Controller\PublicationsController::class, 'add'])->middleware('is_employee');

Route::add('GET', '/dissertations', [Controller\DissertationsController::class, 'all']);
Route::add(['GET', 'POST'], '/dissertations/add', [Controller\DissertationsController::class, 'add'])->middleware('is_employee');

Route::add('GET', '/aspirants', [Controller\AspirantsController::class, 'all']);
Route::add(['GET', 'POST'], '/aspirants/add', [Controller\AspirantsController::class, 'add'])->middleware('is_admin');
Route::add('GET', '/aspirant', [Controller\AspirantsController::class, 'detail']);

Route::add('GET', '/directors', [Controller\DirectorsController::class, 'all']);
Route::add(['GET', 'POST'], '/directors/add', [Controller\DirectorsController::class, 'add'])->middleware('is_admin');
Route::add('GET', '/director', [Controller\DirectorsController::class, 'detail']);

Route::add('GET', '/reporting', [Controller\UtilesController::class, 'reporting'])->middleware('is_employee');
Route::add(['GET', 'POST'], '/admin', [Controller\UtilesController::class, 'admin'])->middleware('is_admin');