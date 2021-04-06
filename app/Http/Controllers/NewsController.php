<?php

namespace App\Http\Controllers;

use http\Env\Response;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
