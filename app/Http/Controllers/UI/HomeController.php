<?php

namespace App\Http\Controllers\UI;
use App\Product;


class HomeController extends BaseController
{
	public function index()
	{
		$listBookNew=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('show_home',1)->orderBy('index_home')->orderBy('id','desc')->get();

		$data=array();

		$data['listBookNew']=$listBookNew;
		return view("ui.home",$data);
	}
}