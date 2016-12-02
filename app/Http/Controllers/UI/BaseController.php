<?php

namespace App\Http\Controllers\UI;

use Illuminate\Routing\Controller;
use App\Website;
use App\Video;
use App\Product;

class BaseController extends Controller
{
	protected $loadVideo=true;
    protected $loadNewBook=false;
	public function __construct(){
		$website = Website::get();
        $data=array();
        foreach ($website as $key => $value) {
             $data[$value->name]=$value->content;
        }

        $base_data=array();
        $base_data['website']=$data;


        if($this->loadVideo){

        	$video=Video::select('name','image','video_url')->where('display',1)->orderBy('id','desc')->limit(5)->get();
        	$base_data['videos']=$video;
    	}

        if($this->loadNewBook){

            $NewBook=Product::select('name','url','image','price','price_pro','author','updated_at')->where('display',1)->orderBy('id','desc')->limit(5)->get();
            $base_data['newbooks']=$NewBook;
        }

		view()->share('base_data',$base_data);

	}
}