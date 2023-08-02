<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('description');
            $table->string('contact_name', 50);
            $table->string('email', 150);
            $table->string('phone', 20);
            $table->string('address', 150);
            $table->string('fb_link', 100)->nullable();
            $table->string('instagram_link', 100)->nullable();
            $table->string('twitter_link', 100)->nullable();
            $table->string('linked_in_link', 100)->nullable();
            $table->string('youtube_link', 100)->nullable();
            $table->string('vimeo_link', 100)->nullable();
            $table->enum('status', ['1'])->nullable();
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
        Schema::dropIfExists('generals');
    }
}
