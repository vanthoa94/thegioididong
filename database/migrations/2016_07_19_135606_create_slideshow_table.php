<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //dự phòng
            $table->string('url'); //dự phòng
            $table->string('image'); 
            $table->integer('index')->unsigned(); //sort
            $table->tinyInteger('display'); //nếu bằng 0 là ẩn. bằng 1 là hiển thị 
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
        Schema::drop('slideshows');
    }
}
