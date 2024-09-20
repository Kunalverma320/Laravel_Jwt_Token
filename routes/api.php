<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [ApiController::class, 'register'])->name('register');
Route::post('/login', [ApiController::class, 'login'])->name('login');
// Route::get('/profile', [ApiController::class, 'profile'])->middleware('auth:api')->name('profile');

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('/profile', [ApiController::class, 'profile'])->name('profile');
    Route::post('/logout', [ApiController::class, 'logout'])->name('logout');
    Route::post('/refresh', [ApiController::class, 'refresh'])->name('refresh');
    Route::post('/me', [ApiController::class, 'me'])->name('me');
});

