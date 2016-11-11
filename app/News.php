<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';

    protected $fillable = ['cate_id','title','url','image','hot','description','keywords','content'];

}
