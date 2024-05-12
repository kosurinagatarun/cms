<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'slug',
        'featured_image',
        'status',
        'meta_keywords' // Add meta_keywords to fillable attributes
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'meta_keywords' => 'array' // Casting meta_keywords as an array for easier handling
    ];

    /**
     * Set the title and automatically generate a slug if not provided.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (!isset($this->attributes['slug']) || empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    /**
     * Set the slug explicitly, ensuring uniqueness.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (empty($value)) {
            $value = Str::slug($this->attributes['title']);
        } else {
            $value = Str::slug($value);
        }

        $count = Page::whereRaw("slug RLIKE '^{$value}(-[0-9]*)?$'")->count();
        $this->attributes['slug'] = $count ? "{$value}-{$count}" : $value;
    }

    /**
     * Get the path to the featured image.
     *
     * @return string
     */
    public function getFeaturedImagePathAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    /**
     * Accessor to ensure meta_keywords is always returned as an array.
     *
     * @return array
     */
    public function getMetaKeywordsAttribute($value)
    {
        return is_string($value) ? json_decode($value, true) : ($value ?? []);
    }

    /**
     * Mutator to ensure meta_keywords is stored as JSON in the database.
     *
     * @param array $value
     */
    public function setMetaKeywordsAttribute($value)
    {
        $this->attributes['meta_keywords'] = json_encode($value);
    }
}
