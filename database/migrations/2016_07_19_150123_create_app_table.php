<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('app_cate');
            $table->string('name');
            $table->string('url');
            $table->string('description');
            $table->string('keywords');
            $table->string('image');
            $table->string('status',100); //tình trạng
            $table->string('capacity',10); //dung lượng
            $table->string('require',100); //yêu cầu
            $table->string('version',10); //phiên bản hiện tại
            $table->string('developers'); //nhóm phát triển
            $table->text('content'); //bài viết về ứng dụng
            $table->tinyInteger('display');
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
        Schema::drop('apps');
    }
}
