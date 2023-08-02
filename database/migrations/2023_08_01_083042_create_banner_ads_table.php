<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url');
            $table->tinyInteger('type')->unsigned()->comment('1: top banner 700x70, 2: side banner 500x280, 3: center banner 700x70');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('0: inactive, 1: active, 2: deleted');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_ads');
    }
}
