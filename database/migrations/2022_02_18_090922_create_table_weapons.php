<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWeapons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->string('substat', 50);
            $table->string('effectname', 50);
            $table->text('effect');
            $table->text('icon')->nullabel();
            $table->text('awakenicon')->nullabel();
            $table->string('weapontype', 20);
            $table->char('rarity', 1);
            $table->json('r1');
            $table->json('r2');
            $table->json('r3');
            $table->json('r4');
            $table->json('r5');
            $table->float('attack');
            $table->float('specialized');
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
        Schema::dropIfExists('weapons');
    }
}
