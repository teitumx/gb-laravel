<?php

namespace App\Http\Controllers;

use App\Models\News;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = (new News())->getNews();
        return view('news.index', ['news' => $news]);
    }

    public function show(int $id)
    {
        $news = (new News())->getNewsByID($id);
        return  view('news.show', ['news' => $news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
