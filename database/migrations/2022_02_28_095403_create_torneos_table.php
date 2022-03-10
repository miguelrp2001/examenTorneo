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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->date('fecha');
            $table->bigInteger('nivel_id')->unsigned();
            $table->bigInteger('creador_id')->unsigned();
            $table->foreign('creador_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nivel_id')->references('id')->on('nivel_torneos')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('torneos');
    }
};