<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', ['categoryList' => $this->categoryList]);
    }

    public function show($id)
    {
        return "Отобразить все новости категории с ID = {$id}";
    }
}
