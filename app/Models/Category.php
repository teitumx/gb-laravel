<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories()
    {
        return DB::table('categories')
            ->select(['id', 'title', 'description', 'created_at'])
            ->where('is_visible', true)
            ->get();
        //return DB::select("SELECT id, title, description, created_at FROM categories");

    }

    public function getCategoryById(int $id)
    {
        return DB::selectOne("SELECT id, title, description FROM categories WHERE id= :id",
            ['id' => $id]);
    }
}
