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
            $table->increments('id')->unique();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('gender')->nullable();
            $table->string('email')->unique();
        
            $table->string('password');
            $table->enum('user_type', ['admin', 'user'])->default('user'); 
            $table->tinyInteger('age')->default();
            $table->string('address')->nullable();
            $table->string('utype')->default()->comment('ADM for Admin and USR for user or Customer');
            $table->string('number')->nullable();
            $table->string('city')->nullable();
            $table->string('ZIP')->nullable();
            $table->enum('status', ['actif', 'inactif']);
   
           
        
            $table->timestamp('email_verified_at')->nullable();
        
            $table->rememberToken()->unique();
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
