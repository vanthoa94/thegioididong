<?php

namespace App\Http\Controllers\UI;

use Illuminate\Routing\Controller;
use App\Website;
use App\Video;
use App\Product;
use App\Ads;

class BaseController extends Controller
{
	protected $loadVideo=true;
    protected $loadNewBook=false;
    protected $loadFeBook=false;
	public function __construct(){
		$website = Website::get();
        $data=array();
        foreach ($website as $key => $value) {
             $data[$value->name]=$value->content;
        }

        $base_data=array();
        $base_data['website']=$data;


        if($this->loadVideo){

        	$video=Video::select('name','image','video_url')->where('display',1)->orderBy('id','desc')->limit(6)->get();
        	$base_data['videos']=$video;
    	}

        if($this->loadNewBook){

            $NewBook=Product::select('name','url','image','price','price_pro','author','updated_at')->where('display',1)->orderBy('id','desc')->limit(3)->get();
            $base_data['newbooks']=$NewBook;
        }

        if($this->loadFeBook){

            $Featured=Product::select('name','url','image','price','viewer','author','updated_at')->where('display',1)->orderBy('viewer','desc')->limit(3)->get();
            $base_data['featured']=$Featured;
        }

        $qc=Ads::select('title','url','image','position')->where('display',1)->where('position','<>',4)->orderBy('id','desc')->get();

        $arrqc=array();

        foreach ($qc as $item) {
            if(!isset($arrqc[$item->position])){
                $arrqc[$item->position]=array();
            }
            $arrqc[$item->position][]=array(
                'title'=>$item->title,
                'url'=>$item->url,
                'image'=>$item->image
            );
        }

        $base_data['qc']=$arrqc;

		view()->share('base_data',$base_data);

	}
}