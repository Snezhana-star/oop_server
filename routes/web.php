<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
Route::add(['GET','POST'], '/profile', [Controller\Site::class, 'profile'])->middleware('auth','role:Админ|Методист|Преподаватель');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('auth','role:Админ');
Route::add(['GET', 'POST'], '/createDoc', [Controller\Site::class, 'createDoc'])->middleware('auth','role:Методист');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
Route::add('GET', '/viewDoc', [Controller\Site::class, 'viewDoc'])->middleware('auth', 'role:Админ|Методист|Преподаватель');
Route::add(['GET', 'POST'], '/statusUpdate', [Controller\Site::class, 'statusUpdate'])->middleware('auth','role:Админ');
Route::add(['GET', 'POST'], '/updateDoc', [Controller\Site::class, 'updateDoc'])->middleware('auth', 'role:Методист');

