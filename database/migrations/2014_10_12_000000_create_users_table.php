<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('phone', 20)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('gender', 10)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('type', 20)->nullable();
            $table->string('status',20)->default('unverified');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::table('users')->insert([
            'name'              => 'admin',
            'slug'              => 'admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('admin'),
            'email_verified_at' => now(),
            'type'              => 'system',
            'phone'             => '9861446462',
            'status'            => 'verified',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
