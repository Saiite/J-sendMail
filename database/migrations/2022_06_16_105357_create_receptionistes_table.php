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
        Schema::create('receptionistes', function (Blueprint $table) {
            $table->id();
            $table->string('receptioniste_noms');
            $table->string('receptioniste_prenoms');
            $table->string('receptioniste_email');
            $table->string('receptioniste_password');
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
        Schema::dropIfExists('receptionistes');
    }
};
