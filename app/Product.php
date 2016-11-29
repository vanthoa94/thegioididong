<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='books';

    protected $fillable = ['cate_id','name','url','image','price','description','keywords','status','quantity','promotion','author','show_home'];

    public static function getStatus(){
    	return array(
    		"Còn Tiếp",
    		"Hoàn thành",
    		"Tạm dừng",
    		"Dừng xuất bản"
    	);
    }
}
