<?php

namespace App\Http\Controllers\UI;
use App\Page;


class PageController extends BaseController
{
	protected $loadNewBook=true;
	public function index($url)
	{
		$info=Page::select('title','meta_description','meta_keywords','content','updated_at','viewer')->where('url',$url)->first();

		if($info==null)
			return view('errors.404');
		return view("ui.page",array('info'=>$info));
	}
}