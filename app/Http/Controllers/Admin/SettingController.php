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

		$info=Website::get();
		$data=array();
		foreach ($info as $key => $value) {
			$data[$value->name]=$value->content;
		}

		
		return view("backend.setting.index",array('data'=>$data));
	}


	public function update(){
		

		$info=new Website();
	
		$info->where('name','background_color')->update(array('content'=>Input::get('background_color')));

		$info->where('name','background_footer')->update(array('content'=>Input::get('background_footer')));

		$info->where('name','background_menu')->update(array('content'=>Input::get('background_menu')));

		$info->where('name','background_color_menu')->update(array('content'=>Input::get('background_color_menu')));

		$info->where('name','background_header')->update(array('content'=>Input::get('background_header')));

		$info->where('name','background_menutop')->update(array('content'=>Input::get('background_menutop')));

		$info->where('name','background_hover_menu')->update(array('content'=>Input::get('background_hover_menu')));

		$info->where('name','TextColor')->update(array('content'=>Input::get('TextColor')));

		$info->where('name','TextColorHover')->update(array('content'=>Input::get('TextColorHover')));

		$info->where('name','text_color_menutop')->update(array('content'=>Input::get('text_color_menutop')));


		return redirect('admin/setting')->with(['message'=>'Cập nhật thành công.']);
		

	}

}

?>