<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppCate extends Model
{
    protected $table='app_cate';

    protected $fillable = ['name', 'url', 'parent'];

    public $timestamps=false;
}
