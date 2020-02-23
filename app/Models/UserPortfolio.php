<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPortfolio extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_name',
        'project_type',
        'project_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
