<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';

    protected $fillable = ['customer_name','customer_address','customer_phone','customer_email','note','payment_method'];
}
