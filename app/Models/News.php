<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'id',
        'category_id',
        'title',
        'newstext',
        'author',
        'created_at',
        'slug',
        'status'
    ];


    public function getNewsCount(): int
    {
        return DB::table('news')
            ->select(['id', 'title', 'newstext', 'author', 'status', 'created_at'])
            ->count();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


}
