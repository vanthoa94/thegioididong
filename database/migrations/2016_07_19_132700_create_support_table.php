<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('phone',15);
            $table->string('skype');
            $table->string('yahoo'); 
            $table->tinyInteger('group'); //thuộc nhóm phân phối hay hỗ trợ
            $table->tinyInteger('display'); //nếu bằng 0 là ẩn. bằng 1 là hiển thị
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('support');
    }
}
