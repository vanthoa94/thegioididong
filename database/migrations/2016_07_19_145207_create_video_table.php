<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //tên video. hiển thị dưới hình
            $table->string('title'); //tiêu đề video. hiển thị trên trình duyệt
            $table->string('url');
            $table->string('image');
            $table->tinyInteger('source'); //nguồn video. VD: 1 là youtube, 2 là picasa, 3 là tại up trực tiếp tạo website,..
            $table->string('video_url');
            $table->tinyInteger('display'); //1 là hiện thị, 0 là ẩn
            $table->integer('view'); //lượt xem. dự phòng
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
        Schema::drop('videos');
    }
}
