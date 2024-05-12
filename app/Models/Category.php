<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // // Relationship with BlogPost
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}

