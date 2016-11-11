<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    protected $table='group_role';

    protected $fillable = ['name'];
}
