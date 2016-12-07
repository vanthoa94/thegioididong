<?php

namespace App\Http\Controllers\Admin;
use App\Website;
use Input;
use Cache;

class InfoController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('info/list')){
			return $this->ErrorPermission('Thông tin website');
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

		
		return view("backend.info.index",array('data'=>$data));
	}

	public function postinfoall(){

		if(!$this->checkPermission('info/update')){
			return $this->ErrorPermission('Cập nhật thông tin website');
		}

		$info=new Website();
		$info->where('name','title')->update(array('content'=>str_replace("\"", "'", trim(Input::get('title')))));
		$info->where('name','meta_description')->update(array('content'=>str_replace("\"", "'", trim(Input::get('meta_description')))));
		$info->where('name','meta_keywords')->update(array('content'=>str_replace("\"", "'", trim(Input::get('meta_keywords')))));
		$info->where('name','copyright')->update(array('content'=>str_replace("\n","<br>",trim(Input::get('copyright')))));
		if(Cache::has('c_a_websites'))
				Cache::forget('c_a_websites');
		return redirect('admin/info')->with(['message'=>'Cập nhật thành công thông tin chung.']);
	}

	public function contact(){
		if(!$this->checkPermission('info/update')){
			return $this->ErrorPermission('Cập nhật thông tin website');
		}
		$info=new Website();
		$info->where('name','hotline')->update(array('content'=>str_replace("\"", "'", trim(Input::get('hotline')))));
		$info->where('name','facebook')->update(array('content'=>str_replace("\"", "'", trim(Input::get('facebook')))));
		$info->where('name','skype')->update(array('content'=>trim(Input::get('skype'))));


		$info->where('name','zalo')->update(array('content'=>trim(Input::get('zalo'))));


		$info->where('name','google')->update(array('content'=>trim(Input::get('google'))));

		$info->where('name','email')->update(array('content'=>trim(Input::get('email'))));

		$info->where('name','address')->update(array('content'=>trim(Input::get('address'))));

		$info->where('name','GPKD')->update(array('content'=>trim(Input::get('GPKD'))));

		if(Cache::has('c_a_websites'))
				Cache::forget('c_a_websites');
		return redirect('admin/info')->with(['message'=>'Cập nhật thành công thông tin liên hệ.']);
	}

	public function setting(){
		if(!$this->checkPermission('info/update')){
			return $this->ErrorPermission('Cập nhật thông tin website');
		}
		$info=new Website();
		

		$info->where('name','email_send')->update(array('content'=>trim(Input::get('email_send'))));

		$info->where('name','password_send')->update(array('content'=>trim(Input::get('password_send'))));

		if(Cache::has('c_a_websites'))
				Cache::forget('c_a_websites');
		return redirect('admin/info')->with(['message'=>'Cập nhật thành công cấu hình send mail.']);
	}


	public function changelogo(){
		if(Input::file()) {
			$image = Input::file('logo');
			if($image->move(public_path('images/'),"logo.jpg")){
				return redirect('admin/info')->with(['message'=>'Cập nhật thành công logo. Do cơ chế save cache của trình duyệt, có thể phải mất vài phút logo mới được cập nhật.']);
			}else{
				return redirect('admin/info')->with(['message'=>'Cập nhật logo thất bại.']);
			}
		}
	}

	public function changefavicon(){
		if(Input::file()) {
			$image = Input::file('favicon');
			if($image->move(public_path('images/'),"favicon.ico")){
				return redirect('admin/info')->with(['message'=>'Cập nhật thành công favicon. Do cơ chế save cache của trình duyệt, có thể phải mất vài phút favicon mới được cập nhật.']);
			}else{
				return redirect('admin/info')->with(['message'=>'Cập nhật favicon thất bại.']);
			}
		}
	}

}

?>