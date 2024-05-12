<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'designation_id',
        'description',
        'photo',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'email',
        'phone',
        'status',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
