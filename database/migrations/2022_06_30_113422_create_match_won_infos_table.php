<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchWonInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_won_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("schedule_id")->nullable();
            $table->bigInteger("first_team_id")->nullable();
            $table->bigInteger("second_team_id")->nullable();
            $table->bigInteger("won_team_id")->nullable();
            $table->string("won_by")->nullable();
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
        Schema::dropIfExists('match_won_infos');
    }
}
