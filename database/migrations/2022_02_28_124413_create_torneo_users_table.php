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
        Schema::create('torneo_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('torneo_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Faltan las relaciones

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneo__users');
    }
};