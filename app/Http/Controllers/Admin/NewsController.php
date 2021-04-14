<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('category')
            ->paginate(7);

        return view('admin.news.index', [
            'news' => $news,
            "count" => News::count()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::get();

        return view('admin.news.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = \Illuminate\Support\Str::slug($request['title']);
        $data = $request->only('category_id', 'title', 'author', 'slug', 'status', 'newstext');
        $news = News::create($data);

        //Если новость добавлена успешно
        if($news)
        {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить категорию');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $category = Category::all();
        return view('admin.news.edit', ['news'=>$news, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->only('category_id', 'title', 'author', 'slug', 'status', 'newstext');
        $newsUpdate = $news->fill($data)->save();

        if($newsUpdate)
        {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно изменененна');
        }

        return back()->with('error', 'Не удалось изменить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            if(request()->ajax()){
                $news->delete();

                return response()->json(['success' => true]);
            }
        } catch (\Exception $error) {
        return response()->json(['success' => false]);
        }

    }
}
