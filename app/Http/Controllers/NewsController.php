<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news', ['newsList' => $this->newsList]);
    }

    public function show(int $id)
    {
        return "Отобразить запись с ID = {$id}";
    }
}
