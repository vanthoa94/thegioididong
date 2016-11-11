<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('news_cates');
            $table->string('title',500);
            $table->string('url',500);
            $table->string('image');
            $table->tinyInteger('hot'); //có phải là tin tiêu điểm không
            $table->string('description'); //mô tả
            $table->string('keywords'); //từ khóa
            $table->text('content');
            $table->tinyInteger('display');  //nếu bằng 0 là ẩn. bằng 1 là hiển thị 
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
        Schema::drop('news');
    }
}
