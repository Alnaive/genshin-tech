<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBuilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('country', 100)->nullable();
            $table->integer('character_id');
            $table->integer('ascension');
            $table->integer('char_lv');
            $table->char('conste',1);
            $table->integer('weapon_id');
            $table->integer('refinement');
            $table->integer('four_pcs_art')->nullable();
            $table->json('two_pcs_art')->nullable();
            $table->integer('flower_id');
            $table->integer('plume_id');
            $table->integer('sand_id');
            $table->integer('goblet_id');
            $table->integer('circlet_id');
            $table->string('main_sand', 30);
            $table->string('main_goblet', 30);
            $table->string('main_circlet', 30);
            $table->integer('talent1');
            $table->integer('talent2');
            $table->integer('talent3');
            $table->json('party_id');
            $table->integer('hp');
            $table->integer('atk');
            $table->integer('defense');
            $table->integer('em');
            $table->float('c_rate');
            $table->float('c_damage');
            $table->float('healing_bonus');
            $table->float('er');
            $table->float('elemental_dmg');
            $table->float('physical_dmg');
            $table->text('source')->nullable();
            $table->string('name', 30)->nullable();
            $table->enum('status',['draft','publish']);
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
        Schema::dropIfExists('builds');
    }
}
