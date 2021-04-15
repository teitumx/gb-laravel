<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

    }

    public function store(ContactForm $request)
    {
        return view('news.contact', ["data" => $request->validated()]);

    }

}
