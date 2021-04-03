<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     protected $newsList = [
         '<em>News 1</em>',
         'News 2',
         'News 3',
         'News 4',
         'News 5'
     ];

    protected $categoryList = [
        'Category 1',
        'Category 2',
        'Category 3',
        'Category 4',
        'Category 5'
    ];
}
