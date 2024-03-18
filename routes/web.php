<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index']) -> name('user.index');
Route::get('/register', [UserController::class, 'register']) -> name('user.registerview');
Route::get('/list', [UserController::class, 'list']) -> name('user.list');
Route::get('/user/{user}/edit/', [UserController::class, 'edit']) -> name('user.edit');

Route::post('/api/login', [UserController::class, 'login']) -> name('user.login');
Route::post('/api/user/logout', [UserController::class, 'logout']) -> name('user.logout');
Route::post('/api/user/register', [UserController::class, 'store']) -> name('user.register');
Route::put('/api/user/{user}/update/', [UserController::class, 'update']) -> name('user.update');
Route::delete('/api/user/{user}/destroy/', [UserController::class, 'destroy']) -> name('user.destroy');

