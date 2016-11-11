<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_cate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('url',100);
            $table->integer('parent')->unsigned();
            $table->integer('index')->unsigned(); //sắp xếp
            $table->tinyInteger('display');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_cate');
    }
}
