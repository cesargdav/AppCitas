<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('matchMaker');
            $table->foreign('matchMaker')->references('id')->on('users');
            $table->unsignedInteger('matched');
            $table->foreign('matched')->references('id')->on('users');
            $table->enum('status', [
                \App\Match::ACCEPTED,
                \App\Match::PENDING,
                \App\Match::REJECTED
            ])->default(\App\Match::PENDING);
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
        Schema::dropIfExists('matches');
    }
}
