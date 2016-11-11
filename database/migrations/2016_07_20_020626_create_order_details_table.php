<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('id')->on('products');
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->timestamps();
        });

        DB::table('websites')->insert(
            [
                [
                    'name' => 'slide_top',
                    'content' => 'DANGCAPDIGITAL.COM'
                ],
                [
                    'name' => 'slide_top',
                    'content' => 'WEBSITE HÀNG ĐẦU VỀ ĐỒ CHƠI CÔNG NGHỆ'
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
