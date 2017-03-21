<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table-> integer ('author_id') -> unsigned() -> default(0);
            $table->foreign('author_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->string('title', 150)->unique();
            $table->string('description');
            $table->text('body');
            $table->string('slug', 150)->unique();
            $table->string('images');
            $table->boolean('active');
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
        Schema::drop('posts');
    }
}
