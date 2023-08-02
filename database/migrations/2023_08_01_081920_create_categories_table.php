<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('parent_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('sort_order');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('0: inactive, 1: active, 2: deleted');
            $table->timestamps();
        });
        DB::unprepared('
                        CREATE TRIGGER categories_before_insert
                        BEFORE INSERT ON categories
                        FOR EACH ROW
                        BEGIN
                        IF NEW.parent_id IS NOT NULL AND NEW.parent_id > NEW.id THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "parent_id cannot exceed id";
                        END IF;
                        END;
                        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
