<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_visible', true)
            ->paginate(7);
        return view('admin.news.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request): \Illuminate\Http\Response
    {
        $category = Category::create($request->validated());

        //Если категория добавлена успешно
        if($category)
        {
            return redirect()->route('admin.categories.index')
                ->with('success', trans('messages.admin.categories.create.success'));
        }

        return back()->with('error', trans('messages.admin.categories.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.news.categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategory $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $categoryUpdate = $category->fill($request->validated())->save();

        if($categoryUpdate)
        {
            return redirect()->route('admin.categories.index')
                ->with('success', trans('messages.admin.categories.update.success'));
        }

        return back()->with('error', trans('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if(request()->ajax()){
                $category->delete();

                return response()->json(['success' => true]);
            }
        } catch (\Exception $error) {
            return response()->json(['success' => false]);
        }
    }
}
