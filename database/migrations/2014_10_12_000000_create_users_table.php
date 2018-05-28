<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'roles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->default(\App\Role::GUEST);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('picture')->nullable();

            //Cashier Columns
            $table->string('conekta_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('profile', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('sex');
            $table->string('profession');
            $table->string('alcohol');
            $table->string('smoke');
            $table->string('party');
            $table->string('bar');
            $table->string('casual');
            $table->string('hobby');
            $table->string('status');
            $table->string('relation');
            $table->float('height');
            $table->string('complexion');
            $table->string('skin');
            $table->string('heir');
            $table->string('eyes');
            $table->string('ethnic');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('preferences', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('sex');
            $table->string('profession');
            $table->string('alcohol');
            $table->string('smoke');
            $table->string('party');
            $table->string('bar');
            $table->string('casual');
            $table->string('hobby');
            $table->string('status');
            $table->string('relation');
            $table->float('height');
            $table->string('complexion');
            $table->string('skin');
            $table->string('heir');
            $table->string('eyes');
            $table->string('ethnic');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('subscriptions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('conekta_id');
            $table->string('conkta_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('user_social_account', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('provider');
            $table->string('provider_uid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('profile');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('user_social_account');
    }
}
