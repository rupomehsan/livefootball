<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("tournament_id")->nullable();
            $table->bigInteger("group_id")->nullable();
            $table->integer("match_no")->nullable();
            $table->bigInteger("first_team_id")->nullable();
            $table->bigInteger("second_team_id")->nullable();
            $table->string("stadium")->nullable();
            $table->string("date")->nullable();
            $table->time("time")->nullable();
            $table->string("image")->nullable();
            $table->string("status")->default(0);
            $table->string("match_result_status")->default(0);
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
        Schema::dropIfExists('schedules');
    }
}
