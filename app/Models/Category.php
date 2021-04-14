<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'description',
        'is_visible'
    ];

    protected $casts = [
        'is_visible' => 'boolean'
    ];

//    public function getCategoryById(int $id)
//    {
//        return DB::selectOne("SELECT id, title, description FROM categories WHERE id= :id",
//            ['id' => $id]);
//    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
