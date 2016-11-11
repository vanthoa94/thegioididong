<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique(); //tên menu
            $table->string('url')->unique(); //url của menu
            $table->smallInteger('index'); //sắp xếp
            $table->integer('parent_id')->unsigned();
            $table->string('color',10); //mã màu
            $table->tinyInteger('show_menu_top'); //có hiển thị lên menutop không
            $table->tinyInteger('show_footer'); //có hiển thị dưới footer ko
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
