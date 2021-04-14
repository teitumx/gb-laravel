<?php

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

use App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\WelcomeController as WelcomeController;
use \App\Http\Controllers\CategoryController as CategoryController;
use \App\Http\Controllers\ContactController as ContactController;


Route::get('/about', function () {
    return
        "<h1> Новостной сайт </h1> <br>
        <p>это интернет-издание, специализация которого заключается в сборе и выдаче общетематических новостей или новостных материалов на одну тему.</p>";
});

Route::get('/', [NewsController::class, 'index'])
    -> name('news');

Route::get('/news/contact', [ContactController::class, 'store'])
    -> name('contact.store');

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '[0-9]')
    ->name('news.show');


// Показ всех категорий
Route::get('/categories', [CategoryController::class, 'index'])
    -> name('categories');

// Показ всех новостей из определенной категории
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])
    ->where('id', '[0-9]')
    ->name('categories.show');


//Для админа
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::delete('admin/news/delete/{$id}', [NewsController::class, 'destroy']);
