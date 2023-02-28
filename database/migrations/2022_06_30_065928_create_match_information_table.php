<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("schedule_id")->nullable();
            $table->bigInteger("first_team_id")->nullable();
            $table->bigInteger("second_team_id")->nullable();
            $table->json("first_team_squad")->nullable();
            $table->json("second_team_squad")->nullable();
            $table->string("link")->nullable();
            $table->string("link_type")->nullable();
            $table->string("first_team_captain")->nullable();
            $table->string("second_team_captain")->nullable();
            $table->string("first_team_keeper")->nullable();
            $table->string("second_team_keeper")->nullable();
            $table->string("first_team_couch")->nullable();
            $table->string("second_team_couch")->nullable();
            $table->string("status")->default(0);
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
        Schema::dropIfExists('match_information');
    }
}
