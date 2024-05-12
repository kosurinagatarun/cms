<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'featured_image',
        'client_name',
        'duration',
        'status',
        'location',
        'start_date',
        'end_date',
        'category_id',
        'slug', // Added slug field
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });

        static::updating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }

    protected $dates = ['start_date', 'end_date'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }
}
