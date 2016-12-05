<?php

namespace App\Http\Controllers\UI;
use App\Video;

class VideoController extends BaseController
{
	protected $loadVideo=false;
	public function index()
	{

		$data=array();

		$data['videos']=Video::select('name','url','image')->where('display',1)->orderBy('id','desc')->paginate(12);

		$data['total']=$data['videos']->total();

		return view("ui.video.video",$data);
	}

	public function detail($url){
		$info=Video::select('id','title','video_url','view','updated_at')->where('url',$url)->first();
		if($info==null){
			return view("errors.404");
		}
		$data=array();

		$data['info']=$info;

		$isAddViewer=false;

		if(!isset($_COOKIE['viewvideo'])){
			$isAddViewer=true;

			setcookie('viewvideo',$info->id,time()+1200);
		}else{
			$arrviewer=explode(',',$_COOKIE['viewvideo']);

			if(!in_array($info->id, $arrviewer)){
				$arrviewer[]=$info->id;

				$isAddViewer=true;

				setcookie('viewvideo',implode(',', $arrviewer),time()+1200);
			}
		}

		if($isAddViewer){
			Video::where('id',$info->id)->update(array('view'=>$info->view+1));
		}

		return view("ui.video.detail",$data);
	}
}