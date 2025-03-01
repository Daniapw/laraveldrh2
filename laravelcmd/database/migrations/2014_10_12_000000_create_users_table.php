<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('username', 100);
            $table->string('email', 100)->unique();
            $table->string('country', 100);
            $table->string('sex', 100);
            $table->string('postal_code', 100)->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->date('date_of_birth');
            $table->string('role')->default('user');
            $table->string('profile_img_file', 300)->default('default_user.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 300);
            $table->rememberToken();
            $table->timestamps();
        });
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
