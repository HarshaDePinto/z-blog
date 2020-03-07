<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'video'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}