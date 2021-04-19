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
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\CategoryController as CategoryController;
use \App\Http\Controllers\ContactController as ContactController;
use App\Http\Controllers\Account\AccountController as AccountController;
use \Illuminate\Support\Facades\Auth as Auth;


Route::get('/', function () {
    return view('welcome');
});

// Для всех
Route::get('/news', [NewsController::class, 'index'])
    -> name('news');

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '[0-9]')
    ->name('news.show');

Route::get('/categories/show/{id}', [CategoryController::class, 'show'])
    ->where('id', '[0-9]')
    ->name('categories.show');

Route::get('/news/contact', [ContactController::class, 'store'])
    -> name('contact.store');

Route::get('/logout', function (){
    \Auth::logout();
    return redirect()->route('news');
}) -> name('logout');


//Для админа
Route::group(['middleware' => 'auth'], function() {

    //Для админа
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUsersController::class);
    });


    //Для авторизации
    Route::get('/account', AccountController::class )
        ->name('account');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

