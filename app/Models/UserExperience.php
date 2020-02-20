<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'designation',
        'experience',
        'from',
        'to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
