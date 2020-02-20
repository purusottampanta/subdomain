<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique()->index()->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('settings')->insert([
            ['key' => 'facebook_url', 'value' => "https://www.facebook.com/", 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'twitter_url', 'value' => "https://www.twitter.com/", 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'youtube_url', 'value' => "https://www.youtube.com/", 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'linkedin_url', 'value' => "https://www.linkedin.com/", 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'instagram_url', 'value' => "https://www.instagram.com/", 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'phone_number', 'value' => "(977)14445124", 'created_at' => $now, 'updated_at' => $now]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
