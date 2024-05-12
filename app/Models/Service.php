<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubService;


class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image'
    ];

    // Define the relationship with sub-services
    public function subServices()
    {
        return $this->hasMany(SubService::class);
    }
}
