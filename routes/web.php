<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
    return view('welcome');
});


Route::prefix('/blog')->name('blog.')->group(function(){
    Route::get('/', [BlogController::class, 'welcome'])->name('welcome');
    Route::get('/index', [BlogController::class, 'index'])->name('index');
    Route::get('/show/{id}', [BlogController::class, 'show'])->name('show');
});



Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->group(function(){
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store')->name('store');
    Route::get('/edit/{post}', 'edit')->name('edit');
    Route::patch('/edit/{post}', 'update')->name('update');
    Route::get('/', 'index')->name('index');
    Route::delete('/destroy/{post}', 'destroy')->name('destroy');
    Route::get('/search', 'search')->name('search');
});
