<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/edit/blade{id}', [App\Http\Controllers\UserController::class, 'edit_blade'])->name('edit.blade');
Route::get('/', [App\Http\Controllers\UserController::class, 'view_blade'])->name('view_blade');
Route::post('/insert/information', [App\Http\Controllers\UserController::class, 'insert_information'])->name('insert.information');
