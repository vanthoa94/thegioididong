<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorys';

    protected $fillable = ['parent', 'name', 'url','meta_description','meta_keywords','show_home'];

    public $timestamps=false;
}
