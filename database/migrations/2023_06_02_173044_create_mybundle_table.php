<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMybundleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mybundle', function (Blueprint $table) {
            $table->bigIncrements('mybundle_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->bigInteger('bundlelist_id')->unsigned();
            $table->foreign('bundlelist_id')->references('bundlelist_id')->on('bundle_list');
            $table->enum('Bundle_privacy', ['off', 'on']);
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
        Schema::dropIfExists('mybundle');
    }
}
