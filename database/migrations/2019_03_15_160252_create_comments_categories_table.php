<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('author')->required();
            $table->text('content')->required();
            $table->integer('category_id')->unsigned()->required();
            $table->timestamps();
        });
        Schema::table('comments_categories', function($table)
        {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_categories');
    }
}
