<?php

namespace App\Http\Controllers\UI;
use App\Product;
use App\SlideShow;


class HomeController extends BaseController
{
	public function index()
	{
		$listBookNew=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('show_home',1)->where('cate_id','<>',2)->orderBy('index_home')->orderBy('id','desc')->limit(12)->get();

		$data=array();

		$data['listBookNew']=$listBookNew;

		$data['slideshow']=SlideShow::select('title','url','image')->where('display',1)->orderBy('index','asc')->get();

		return view("ui.home",$data);
	}

	public function search()
	{
		if(\Input::get('q')==null){
			return redirect('/');
		}
		$query=trim(\Input::get('q'));

		if($query=='')
			return redirect('/');

		$query=mb_strtolower($query,'UTF-8');

		$query = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $query);
		$query = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $query);
		$query = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $query);
		$query = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $query);
		$query = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $query);
		$query = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $query);
		$query = preg_replace("/(đ)/", 'd', $query);

		if (preg_match_all("/[a-za-z0-9- ]*/", $query, $matches)) {
			$str="";
			foreach($matches[0] as $value)
	        {
	        	$str.=$value;
	        }

			$str=str_replace(" ", "-", $str);
			$str=str_replace("--", "-", $str);
			$str=str_replace("--", "-", $str);

			$query=$str;  
		}

		if($query=='')
			return redirect('/');

		$products=Product::select('name','url','image','author','price','price_pro')->where('url','like','%'.$query.'%')->where('display',1)->orderBy('id','desc')->paginate(12);
		$total=$products->total();

		$videos=\App\Video::select('name','url','image')->where('url','like','%'.$query.'%')->where('display',1)->orderBy('id','desc')->paginate(12);
		$total1=$videos->total();


		return view("ui.search",array('products'=>$products,'total'=>$total,'videos'=>$videos,'total1'=>$total1));
	}
}