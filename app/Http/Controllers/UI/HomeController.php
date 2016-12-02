<?php

namespace App\Http\Controllers\UI;
use App\Product;
use App\SlideShow;


class HomeController extends BaseController
{
	public function index()
	{
		$listBookNew=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('show_home',1)->orderBy('index_home')->orderBy('id','desc')->limit(12)->get();

		$data=array();

		$data['listBookNew']=$listBookNew;

		$data['slideshow']=SlideShow::select('title','url','image')->where('display',1)->orderBy('index','asc')->get();

		return view("ui.home",$data);
	}
}