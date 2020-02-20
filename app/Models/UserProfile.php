<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'profession',
        'current_company',
        'expected_salary',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
