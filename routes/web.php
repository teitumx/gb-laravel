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

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return
        "<h1> Новостной сайт </h1> <br>
        <p>это интернет-издание, специализация которого заключается в сборе и выдаче общетематических новостей или новостных материалов на одну тему.</p>";
});

Route::get('/news', [NewsController::class, 'index'])
    -> name('news');

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '[0-9]')
    ->name('news.show');


//для админа
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});
