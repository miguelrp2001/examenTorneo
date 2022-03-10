<?php

use App\Models\Torneo;
use App\Models\User;
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
            $table->foreignIdFor(Torneo::class)->references('id')->on('torneos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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