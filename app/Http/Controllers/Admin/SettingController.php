<?php

namespace App\Http\Controllers\Admin;
use App\Website;
use Input;
use Cache;

class SettingController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('info/list')){
			return $this->ErrorPermission('Cấu hình website');
		}


		$data=array();

		if(Cache::has('c_a_websites')){
			$data=Cache::get('c_a_websites');
		}else{

			$info=Website::get();
			foreach ($info as $key => $value) {
				$data[$value->name]=$value->content;
			}

			Cache::forever('c_a_websites',$data);
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

		$info->where('name','content_size')->update(array('content'=>Input::get('content_size')));

		$info->where('name','content_color')->update(array('content'=>Input::get('content_color')));

		$info->where('name','background_boxright')->update(array('content'=>Input::get('background_boxright')));

		$info->where('name','background_content_read')->update(array('content'=>Input::get('background_content_read')));

		$info->where('name','border_box_right')->update(array('content'=>Input::get('border_box_right')));

		$info->where('name','show_box_shadow')->update(array('content'=>Input::get('show_box_shadow')=="on"?1:0));

		if(Cache::has('c_a_websites'))
				Cache::forget('c_a_websites');

		return redirect('admin/setting')->with(['message'=>'Cập nhật thành công.']);
		

	}

}

?>