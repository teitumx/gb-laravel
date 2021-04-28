<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Http\Requests\UpdateNews;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {

        $category = Category::get();

        return view('admin.news.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNews $request
     * @return Response
     */
    public function store(CreateNews $request)
    {
        $request['slug'] = \Illuminate\Support\Str::slug($request['title']);  // создание слага
        $data = $request->only('category_id', 'title', 'author', 'slug', 'status', 'newstext', 'img');
        $news = News::create($data);

        //Если новость добавлена успешно
        if($news)
        {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.create.success'));
        }

        return back()->with('fail', trans('messages.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news)
    {
        $category = Category::all();
        return view('admin.news.edit', ['news'=>$news, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param News $news
     * @return Response
     */
    public function update(UpdateNews $request, News $news)
    {
        $validated = $request->validated();

        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $originalName = $img->getClientOriginalName();
            $originalExt = $img->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $img->storeAs('news', $fileName . '.' . $originalExt, 'public');
            $validated['img'] = $fileLink;
        }
//        $data = $request->only('category_id', 'title', 'author', 'slug', 'status', 'newstext', 'img');
//        $newsUpdate = $news->fill($data)->save();

        $news = $news->fill($validated);
        $news->category_id = $validated['category_id'];
        if($news->save())
        {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }

        return back()->with('error', trans('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
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
