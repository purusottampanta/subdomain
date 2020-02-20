<?php

namespace App\Models;

use DB;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'value'];

    const DEFAULT_KEYS = ['facebook_url', 'twitter_url', 'linkedin_url', 'youtube_url', 'instagram_url','phone_number'];

    public static function boot()
    {
        parent::boot();

        static::saved(function($model) {
            $settings = DB::table('settings')->pluck('value', 'key')->toArray();

    		Cache::forever('settings', $settings);
        });
    }

    public function getTitle()
    {
        return $this->key;
	}

    public function isDeletable()
    {
        return !in_array(strtolower($this->key), self::DEFAULT_KEYS);
    }
}
