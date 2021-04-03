<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['newsList' => $this->newsList]);
    }

    public function show(int $id)
    {
        return  view('news.show', ['news' => $id]);
    }
}
