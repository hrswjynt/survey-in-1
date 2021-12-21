<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use APp\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/profile/{User:id}', [AdminController::class, 'profile']);

Route::get('/surveyor', [AdminController::class, 'surveyor']);
