<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'short_description',
        'full_description',
        'image',
        'published_at',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
