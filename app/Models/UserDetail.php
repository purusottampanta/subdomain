<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'father_name',
        'mother_name',
        'grandfather_name',
        'spouse_name',
        'permanent_address',
        'temporary_address',
        'dob',
        'citizenship_no',
        'citizenship_issue_district',
        'citizenship_issue_date',
        'pan_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
