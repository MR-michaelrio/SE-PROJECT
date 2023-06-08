<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {
            $table->bigIncrements('recipe_id');
            $table->string('recipe_name');
            $table->string('recipe_ingredients');
            $table->string('recipe_equipment');
            $table->string('recipe_steps');
            $table->string('recipe_tips');
            $table->text('recipe_picture');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('category');
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
        Schema::dropIfExists('recipe');
    }
}
