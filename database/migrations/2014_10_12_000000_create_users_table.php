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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('registration_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('role');
            $table->string('phone_number');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('national_id');
            $table->string('constituency');
            $table->string('location');
            $table->string('motorcicle_number')->nullable();
            $table->string('shop')->nullable();
            $table->string('company')->nullable();
            $table->string('photo')->nullable();
            $table->string('description');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('distance')->nullable();
            $table->string('duration')->nullable();
            $table->integer('status')->default(0);
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
