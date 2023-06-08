<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_list', function (Blueprint $table) {
            $table->bigIncrements('bundlelist_id');
            $table->bigInteger('publish_id')->unsigned();
            $table->foreign('publish_id')->references('publish_id')->on('recipe_publish');

            $table->bigInteger('bundle_id')->unsigned();
            $table->foreign('bundle_id')->references('bundle_id')->on('bundle');
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
        Schema::dropIfExists('bundle_list');
    }
}
