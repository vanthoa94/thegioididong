<?php

namespace App\Http\Controllers\UI;

use Illuminate\Routing\Controller;
use App\Website;

class BaseController extends Controller
{
	public function __construct(){
		$website = Website::get();
        $data=array();
        foreach ($website as $key => $value) {
             $data[$value->name]=$value->content;
        }

		view()->share('base_data',['website'=>$data]);

	}
}