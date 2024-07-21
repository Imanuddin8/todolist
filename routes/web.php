<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\ListController;

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

// To do
Route::GET('/', [TodolistController::class, 'index'])->name('todo.index');
Route::POST('/todo/selesai/{id}', [TodolistController::class, 'selesai'])->name('todo.selesai');

// List
Route::GET('/list', [ListController::class, 'index'])->name('list.index');
Route::GET('/list/create', [ListController::class, 'create'])->name('list.create');
Route::POST('/list/store', [ListController::class, 'store'])->name('list.store');
Route::GET('/list/edit/{id}', [ListController::class, 'edit'])->name('list.edit');
Route::PUT('/list/update/{id}', [ListController::class, 'update'])->name('list.update');
Route::DELETE('/list/delete/{id}', [ListController::class, 'delete'])->name('list.delete');
Route::POST('/list/selesai/{id}', [ListController::class, 'selesai'])->name('list.selesai');
Route::GET('/list/filter', [ListController::class, 'filter'])->name('list.filter');
