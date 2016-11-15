<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categorys');
            $table->string('name');
            $table->string('url');
            $table->string('image');
            $table->integer('price')->unsigned(); //giá hiện tại
            $table->string('description',5000); //mô tả về sản phẩm
            $table->string('keywords'); //từ khóa
            $table->tinyInteger('status'); //tính trang sản phẩm
            $table->integer('quantity'); //số lượng sản phẩm
            $table->integer('viewer')->default(0); //lượt xem
            $table->integer('sold')->default(0); //số lượng đã bán. Dùng cho sản phẩm bán chạy
            $table->text('promotion'); //thông tin khuyến mãi
            $table->string('author',200); //thông tin khuyến mãi
            $table->tinyInteger('display');
            $table->tinyInteger('show_home'); //có hiển thị ngoài trang chủ ko?
            $table->integer('index_home'); //số thứ tự hiển thị trên trang chủ. Số càng nhỏ thì hiển thị trước
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
        Schema::drop('book');
    }
}
