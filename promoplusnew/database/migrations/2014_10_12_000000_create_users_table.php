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

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephoneNumber')->nullable();
            $table->string('password');
            $table->boolean('password_has_to_be_changed')->default('1');
            $table->string('api_token', 60)->unique()->nullable();
            $table->integer('company_id');
            $table->integer('role_id');
            $table->rememberToken();
            $table->timestamps();

        });



        Schema::create('role_user', function (Blueprint $table) {

            $table->integer('user_id');
            $table->integer('role_id');
            $table->primary('user_id', 'role_id');

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
