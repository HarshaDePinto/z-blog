<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'content', 'image', 'video', 'category_id', 'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
