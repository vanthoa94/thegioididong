<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //=0 tức là khách vãng lai, >0 tức là người dùng đã được đăng ký
            $table->string('customer_name'); //họ tên khách hàng
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('note',500); //ghi chú của khách hàng
            $table->string('payment_method',100); //phương thức thanh toán
            $table->tinyInteger('delivered'); //đã giao hàng chưa?. 
            $table->dateTime('delivery_date');//ngày giao. 
            $table->string('deliver');//danh sách người giao hàng. VD: văn thỏa, văn đương. Nếu chưa giao hàng thì để trống
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
        Schema::drop('orders');
    }
}
