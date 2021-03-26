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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function (string $name) {
    return "Добро пожаловать, {$name}";
});

Route::get('/about}', function () {
    return
        "<h1> Новостной сайт </h1> <br>
        <p>это интернет-издание, специализация которого заключается в сборе и выдаче общетематических новостей или новостных материалов на одну тему.</p>";
});

Route::get('/news', function () {
    return "Все новости";
});

Route::get('/news/{id}', function ($id) {
    return "Новость с определенным {$id} ";
});

