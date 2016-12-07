<?php

namespace App\Http\Controllers\UI;

use Illuminate\Routing\Controller;
use App\Video;
use App\Product;
use App\Ads;
use App\Category;
use Cache;
use Session;

class BaseController extends Controller
{
	protected $loadVideo=true;
    protected $loadNewBook=false;
    protected $loadFeBook=false;
	public function __construct(){

        $data=array();

        if(Cache::has('c_a_websites')){
            $data=Cache::get('c_a_websites');
        }else{
            $website = \App\Website::get();
            foreach ($website as $key => $value) {
                 $data[$value->name]=$value->content;
            }

            Cache::forever('c_a_websites',$data);
        }

        $base_data=array();
        $base_data['website']=$data;

        if(Cache::has('c_a_category')){
            $listCateInHomeC=Cache::get('c_a_category');
            $listCateInHome=array();
            foreach ($listCateInHomeC as $value) {
                if($value->display==1){
                    $listCateInHome[]=$value;
                }
            }

            $length=count($listCateInHome);

            for($i=0;$i<$length;$i++){

                for($j=$i+1;$j<$length;$j++){
                    if($listCateInHome[$i]->sort_menu>$listCateInHome[$j]->sort_menu){
                        $temp=$listCateInHome[$i];
                        $listCateInHome[$i]=$listCateInHome[$j];
                        $listCateInHome[$j]=$temp;
                    }
                }   
            }
        }else{
            $listCateInHome=Category::select('id','name','url')->where('display',1)->orderBy('sort_menu')->get();
        }


        $base_data['categorys']=$listCateInHome;

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

        if(Session::get('loginuser')!=null){
            $base_data['islogin']=Session::get('loginuser');
        }else{
            $base_data['islogin']=0;
        }

		view()->share('base_data',$base_data);

	}
}