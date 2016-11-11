<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //tiêu đề
            $table->string('url')->unique(); //url dùng để so sánh với url trên trình duyệt
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->text('content'); //nội dung trang
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
        Schema::drop('pages');
    }
}
