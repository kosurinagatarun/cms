<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The blog posts that belong to the tag.
     */
    public function blogPosts()
    {
        return $this->belongsToMany(BlogPost::class);
    }
}
