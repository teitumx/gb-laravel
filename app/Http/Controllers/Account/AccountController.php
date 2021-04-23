<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __invoke(){
        $name = Auth::check() ? Auth::user()->name : 'Гость';
        return "Привет, " . $name . "<br> <a href=' ".route('admin.news.index'). " '> Перейти в панель администратора </a>" ;
    }
}
