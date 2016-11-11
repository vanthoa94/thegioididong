<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table='agencys';

    protected $fillable = ['branch_id', 'name', 'address','phone'];
}
