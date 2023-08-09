<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('tag_ids');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->unsignedBigInteger('view_count');
            $table->tinyInteger('trending')->unsigned()->default(0)->comment('0: not trending, 1: trending');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('0: draft, 1: published');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
