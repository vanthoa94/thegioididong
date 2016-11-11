<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->unsigned(); //nếu bằng 0 tức là chuyên mục gốc
            $table->string('name');
            $table->string('url');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->tinyInteger('show_home');
            $table->integer('sort_home')->unsigned(); //sắp xếp khi hiển thị trên trang chủ
            $table->integer('sort_menu')->unsigned(); //sắp xếp trên menu
            $table->tinyInteger('display');  //nếu bằng 0 là ẩn. bằng 1 là hiển thị 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorys');
    }
}
