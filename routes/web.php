<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//Route that gets te home page

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activities/{id}/edit', [App\Http\Controllers\ActivityController::class, 'edit'])->name('activities.edit');
Route::post('/activities/update', [App\Http\Controllers\ActivityController::class, 'update'])->name('activities.update');
Route::post('/activities', [App\Http\Controllers\ActivityController::class, 'store'])->name('activities.store');