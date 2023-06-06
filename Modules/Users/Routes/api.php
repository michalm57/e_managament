<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Modules\Users\Http\Controllers\AuthController;
use Modules\Users\Http\Controllers\ForgotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function(){
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/forgot', [ForgotController::class, 'forgot'])->name('user.forgot');
    Route::post('/reset', [ForgotController::class, 'reset'])->name('user.reset');
    Route::get('/user', [AuthController::class, 'user'])->name('user.user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
});