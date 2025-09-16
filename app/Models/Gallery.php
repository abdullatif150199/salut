<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'slug', 'subtitle', 'img_thumb', 'description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
