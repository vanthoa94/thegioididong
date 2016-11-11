<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('zone'); //thuộc vùng nào 1 bắc, 2 trung, 3 nam?
            $table->string('name'); //tên chi nhánh
            $table->string('city_name'); //tên thành phố/tỉnh của chi nhánh
            $table->smallInteger('index'); //sắp xếp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
