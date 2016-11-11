<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table='branches';

    protected $fillable = ['zone', 'name', 'city_name','index'];
    public $timestamps=false;
}
