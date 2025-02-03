<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return inertia('Index/Index');
// });

// Route::get('/show', function () {
//     return inertia('Index/Show');
// });

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

/*
* при использования роута 'destroy' было исключение при попытке удалить незарегистрированным пользователем
* ошибка "The DELETE method is not supported for route login.
* Supported methods: GET, HEAD, POST."
* говорит о том, что запрос с методом DELETE обрабатывается не маршрутом,
* связанным с вашим контроллером, а маршрутом, ведущим на страницу логина.
*/
Route::resource('listing', ListingController::class)->only(['create','edit','store'])->middleware('auth');
// Route::resource('listing', ListingController::class)->except(['create','edit','store', 'destroy']);

Route::resource('listing', ListingController::class)
    ->except(['create','edit','store']);

Route::get('login',[AuthController::class,'create'])->name('login');
Route::post('login',[AuthController::class,'store'])->name('login.store');
Route::delete('logout',[AuthController::class,'destroy'])->name('logout');

Route::resource('user-account',UserAccountController::class)->only(['create','store']);
