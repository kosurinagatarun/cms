<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'slug',
        'featured_image',
        'status'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_services';

    /**
     * Get the service that owns the sub-service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
