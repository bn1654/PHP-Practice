<?php

use Src\Route;

Route::add('go', [Controller\SiteContoroller::class, 'index']);
Route::add('hello', [Controller\SiteContoroller::class, 'hello']);
Route::add('signup', [Controller\SiteContoroller::class, 'signup']);
