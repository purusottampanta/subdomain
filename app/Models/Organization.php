<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes, Sluggable;
    
    protected $fillable = [
        'name',
        'slug',
        'country',
        'district',
        'city',
        'address_line_1',
        'email',
        'phone',
        'sec_phone',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTrashed()
            ->withTimestamps()
            ->withPivot('is_owner', 'is_active', 'status', 'state', 'code', 'deleted_at', 'hit_count', 'last_active');
    }

    
}
