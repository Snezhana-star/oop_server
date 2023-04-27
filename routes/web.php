<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
Route::add('GET', '/profile', [Controller\Site::class, 'profile'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
