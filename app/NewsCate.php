<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCate extends Model
{
    protected $table='news_cates';

    protected $fillable = ['name','url','show_home'];

    public $timestamps=false;
}
