<?php

namespace App\Http\Controllers;

use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
        $service->setUrl('https://news.yandex.ru/culture.rss')->parsing();
        dd($service);
    }
}
