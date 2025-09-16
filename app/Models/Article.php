<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image',
        'category_id',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
