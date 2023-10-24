<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

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
    return view('form');
});

Route::get('/user', function () {
    return view('users');
});

Route::post('/',[AjaxController::class,'submit'])->name('addUser');
Route::get('/users',[AjaxController::class,'showUser'])->name('getUser');

Route::get('/form', function () {
    return view('welcome');
});


