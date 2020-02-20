<?php

namespace App\Models;

use App\Traits\PresentableTrait;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, Sluggable, PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const STATUS_PENDING = 'pending';
    const STATUS_UNVERIFIED = 'unverified';
    const STATUS_VERIFIED = 'verified';
    
    protected $presenter = 'App\Presenters\UserPresenter';

    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'gender',
        'profile_picture',
        'created_by',
        'phone',
        'type',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)
            ->withTrashed()
            ->withTimestamps()
            ->withPivot('is_owner', 'is_active', 'status', 'state', 'code', 'deleted_at', 'hit_count', 'last_active');
    }

    public function detail()
    {
    	return $this->hasOne(UserDetail::class);
    }

    public function document()
    {
    	return $this->hasOne(UserDocument::class);
    }

    public function profile()
    {
    	return $this->hasOne(UserProfile::class);
    }

    public function educations()
    {
    	return $this->hasMany(UserEducation::class);
    }

    public function skills()
    {
    	return $this->hasMany(UserSkill::class);
    }

    public function experiences()
    {
    	return $this->hasMany(UserExperience::class);
    }

    public function portfolios()
    {
    	return $this->hasMany(UserPortfolio::class);
    }
}
