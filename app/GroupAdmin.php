<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAdmin extends Model
{
    protected $table='group_admins';

    protected $fillable = ['name'];

    public $timestamps=false;
}
