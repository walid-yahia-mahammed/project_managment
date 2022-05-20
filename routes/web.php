<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
    return view('home');
})->name('home');

Route::post('task',[TaskController::class,'store'])->name('task.store');
Route::put('task',[TaskController::class,'update'])->name('task.save');
Route::get('tasks/{id}',[TaskController::class,'index'])->name('task.index');
Route::get('task/{id}',[TaskController::class,'show'])->name('task.read');
Route::delete('tasks/{id}',[TaskController::class,'destroy'])->name('task.destroy');