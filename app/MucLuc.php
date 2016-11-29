<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MucLuc extends Model
{
    protected $table='muclucs';

    protected $fillable = ['name', 'url', 'image','video','audio','content','display'];
}
