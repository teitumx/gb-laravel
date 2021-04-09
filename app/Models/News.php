<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(bool $isAdmin = false)
    {
        if(!$isAdmin)
        {
            return DB::table('news')
                ->join('categories', 'categories.id', '=', 'news.category_id')
                ->select(['news.id', 'news.title', 'news.newstext', 'news.author', 'news.status', 'news.created_at', 'categories.title as category_title'])
                ->where('news.status', NewsStatusEnum::PUBLISHED )
                ->get();
        }

        return DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select(['news.id', 'news.title', 'news.newstext', 'news.author', 'news.status', 'news.created_at', 'categories.title as category_title'])
            ->get();
    }

    public function  getNewsByID(int $id)
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'newstext', 'author', 'status', 'created_at'])
            ->where('id', $id)
            ->first();
    }

    public function getNewsCount(): int
    {
        return DB::table('news')
            ->select(['id', 'title', 'newstext', 'author', 'status', 'created_at'])
            ->count();
    }


}
