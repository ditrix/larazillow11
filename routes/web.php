<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return inertia('Index/Index');
// });

// Route::get('/show', function () {
//     return inertia('Index/Show');
// });

Route::get('/',[IndexController::class,'index']);
Route::get('/hello',[IndexController::class,'show']);
