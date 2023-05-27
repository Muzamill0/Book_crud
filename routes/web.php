<?php

use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('index');
});

Route::controller(BookController::class)->group(function(){
    Route::get('/books',  'index')->name('books');
    Route::get('/book/create',  'create')->name('book.create');
    Route::post('/book/create',  'store');
    Route::get('/book/{book}/edit',  'edit')->name('book.edit');
    Route::post('/book/{book}/edit',  'update');
    Route::get('/book/{book}/delete',  'destroy')->name('book.delete');
});
