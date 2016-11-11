<?php

namespace App\Http\Controllers\Admin;
use App\Website;
use Input;

class SettingController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('info/list')){
			return $this->ErrorPermission('Cấu hình website');
		}

		$info=Website::where('name','background_image')
		->orWhere('name','background_color')
		->orWhere('name','background_menu')
		->orWhere('name','background_footer')
		->orWhere('name','background_body')
		->orWhere('name','background_color_menu')
		->orWhere('name','background_header')
		->orWhere('name','background_hover_menu')
		->orWhere('name','background_header_top')
		->orWhere('name','icon_trung_tam_bao_hanh')
		->orWhere('name','icon_mua_hang_tu_xa')
		->orWhere('name','icon_dai_ly')
		->orWhere('name','background_center_support')
		->get();
		$data=array();
		foreach ($info as $key => $value) {
			$data[$value->name]=$value->content;
		}

		
		return view("backend.setting.index",array('data'=>$data));
	}

	private function convert($back_img){
		

		if(strpos($back_img, "/public/")===0){
			
		}else{
			$back_img="/public/images/".$back_img;
		}
		return $back_img;
	}

	public function update(){
		$back_img=$this->convert(Input::get('background_image'));

		$back_menu=$this->convert(Input::get('background_menu'));

		$icon_mua_hang_tu_xa=$this->convert(Input::get('icon_mua_hang_tu_xa'));

		$icon_dai_ly=$this->convert(Input::get('icon_dai_ly'));
		$icon_trung_tam_bao_hanh=$this->convert(Input::get('icon_trung_tam_bao_hanh'));

		

		$info=new Website();
		$info->where('name','background_image')->update(array('content'=>$back_img));

		$info->where('name','background_menu')->update(array('content'=>$back_menu));

		$info->where('name','icon_mua_hang_tu_xa')->update(array('content'=>$icon_mua_hang_tu_xa));

		$info->where('name','icon_trung_tam_bao_hanh')->update(array('content'=>$icon_trung_tam_bao_hanh));

		$info->where('name','icon_dai_ly')->update(array('content'=>$icon_dai_ly));

		$info->where('name','background_color')->update(array('content'=>Input::get('background_color')));

		$info->where('name','background_footer')->update(array('content'=>Input::get('background_footer')));

		$info->where('name','background_body')->update(array('content'=>Input::get('background_body')));

		$info->where('name','background_color_menu')->update(array('content'=>Input::get('background_color_menu')));

		$info->where('name','background_header')->update(array('content'=>Input::get('background_header')));

		$info->where('name','background_hover_menu')->update(array('content'=>Input::get('background_hover_menu')));

		$info->where('name','background_header_top')->update(array('content'=>Input::get('background_header_top')));

		$info->where('name','background_center_support')->update(array('content'=>Input::get('background_center_support')));


		return redirect('admin/setting')->with(['message'=>'Cập nhật thành công.']);
		

	}

}

?>