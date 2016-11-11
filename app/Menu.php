<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';

    protected $fillable = ['name','url','parent_id','color','show_menu_top','show_footer'];

    public $timestamps=false;
}
