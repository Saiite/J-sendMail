<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiques', function (Blueprint $table) {
          
          
            $table->increments('id')->unique();
            $table->foreignId('poste_id')->constrained();
            $table->foreignId('user_id')->constrained();
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

        Schema::table('historiques', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('postes_id');
            $table->foreign('postes_id')
                ->references('id')
                ->on('postes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });


        Schema::dropIfExists('historiques');
    }
};
