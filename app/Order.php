<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='mua_sach';

    protected $fillable = ['user_id', 'book_id', 'active','viewer','viewer_day','viewer_date','ip_mua'];
}
