<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDocument extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'pp_photo',
        'citizenship_front',
        'citizenship_back',
        'resume',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
