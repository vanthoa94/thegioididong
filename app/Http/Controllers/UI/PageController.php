<?php

namespace App\Http\Controllers\UI;
use App\Page;


class PageController extends BaseController
{
	protected $loadNewBook=true;
	public function index($url)
	{
		$info=Page::select('id','title','meta_description','meta_keywords','content','updated_at','viewer')->where('url',$url)->first();

		if($info==null)
			return view('errors.404');

		$isAddViewer=false;

		if(!isset($_COOKIE['viewpage'])){
			$isAddViewer=true;

			setcookie('viewpage',$info->id,time()+1200);
		}else{
			$arrviewer=explode(',',$_COOKIE['viewpage']);

			if(!in_array($info->id, $arrviewer)){
				$arrviewer[]=$info->id;

				$isAddViewer=true;

				setcookie('viewpage',implode(',', $arrviewer),time()+1200);
			}
		}

		if($isAddViewer){
			Page::where('id',$info->id)->update(array('viewer'=>$info->viewer+1));
		}

		return view("ui.page",array('info'=>$info));
	}
}