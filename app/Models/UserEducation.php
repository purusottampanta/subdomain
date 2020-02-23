<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducation extends Model
{
    use SoftDeletes;

	protected $table = 'user_educations';
    
    protected $fillable = [
        'education',
        'from',
        'to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
