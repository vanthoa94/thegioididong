<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support';

    protected $fillable = ['name','phone','skype','yahoo','group','email'];
    public $timestamps=false;
}
