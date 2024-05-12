<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_tags',
        'slug',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate slug before creating or updating a blog post
        static::creating(function ($blogPost) {
            $blogPost->slug = self::generateUniqueSlug($blogPost->title);
        });

        static::updating(function ($blogPost) {
            $blogPost->slug = self::generateUniqueSlug($blogPost->title, $blogPost->id);
        });
    }

    // Generate a unique slug based on the title
    private static function generateUniqueSlug($title, $postId = null)
    {
        $slug = Str::slug($title);
        $count = 0;

        // If updating, exclude current post from unique check
        $query = self::where('slug', $slug);
        if ($postId) {
            $query->where('id', '<>', $postId);
        }

        while ($query->exists()) {
            $count++;
            $slug = Str::slug($title) . '-' . $count;
        }

        return $slug;
    }

    // Define relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with Tag model
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
