<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table='apps';

    protected $fillable = ['cate_id', 'name', 'url','description','keywords','image','status','capacity','require','version','developers','content'];
}
