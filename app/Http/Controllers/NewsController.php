<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatusEnum;
use App\Models\News;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            //->select('news.id', 'news.title', 'news.newstext', 'news.author', 'news.created_at')
            ->where('news.status', NewsStatusEnum::PUBLISHED)
            ->paginate(5);

        return view('news.index', ['news' => $news]);
    }

    public function show(int $id)
    {
        $news = News::findOrFail($id);
        return  view('news.show', ['news' => $news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
