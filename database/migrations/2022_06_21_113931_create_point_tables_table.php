<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_tables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("team_id")->nullable();
            $table->bigInteger("tournament_id")->nullable();
            $table->bigInteger("match_play")->nullable();
            $table->bigInteger("win")->nullable();
            $table->bigInteger("loss")->nullable();
            $table->float("net_run")->nullable();
            $table->bigInteger("tied")->nullable();
            $table->bigInteger("goal")->nullable();
            $table->bigInteger("point")->nullable();
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
        Schema::dropIfExists('point_tables');
    }
}
