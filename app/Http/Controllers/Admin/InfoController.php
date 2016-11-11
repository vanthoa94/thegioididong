<?php

namespace App\Http\Controllers\Admin;
use App\Website;
use Input;


class InfoController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('info/list')){
			return $this->ErrorPermission('Thông tin website');
		}

		$info=Website::get();
		$data=array();
		foreach ($info as $key => $value) {
			if(array_key_exists($value->name, $data)){
				$data[$value->name].="\n".$value->content;
			}else
				$data[$value->name]=$value->content;
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


		$info->where('name','giay_phep')->update(array('content'=>str_replace("\n","<br>",trim(Input::get('giay_phep')))));

		try{
			$info->where('name','slide_top')->delete();
			$arr=explode("\n", trim(Input::get('slide_top')));
			foreach($arr as $item){
				if(trim($item)!="")
				$info->insert(['name'=>'slide_top','content'=>trim($item)]);
			}
		}catch(\Expression $e){

		}
		return redirect('admin/info')->with(['message'=>'Cập nhật thành công thông tin chung.']);
	}

	public function contact(){
		if(!$this->checkPermission('info/update')){
			return $this->ErrorPermission('Cập nhật thông tin website');
		}
		$info=new Website();
		$info->where('name','hotline')->update(array('content'=>str_replace("\"", "'", trim(Input::get('hotline')))));
		$info->where('name','phone')->update(array('content'=>str_replace("\"", "'", trim(Input::get('phone')))));
		$info->where('name','facebook')->update(array('content'=>str_replace("\"", "'", trim(Input::get('facebook')))));
		$info->where('name','skype')->update(array('content'=>trim(Input::get('skype'))));


		$info->where('name','google')->update(array('content'=>trim(Input::get('google'))));

		$info->where('name','email')->update(array('content'=>trim(Input::get('email'))));
		$info->where('name','twitter')->update(array('content'=>trim(Input::get('twitter'))));

		return redirect('admin/info')->with(['message'=>'Cập nhật thành công thông tin liên hệ.']);
	}

	public function banhang(){
		if(!$this->checkPermission('info/update')){
			return $this->ErrorPermission('Cập nhật thông tin website');
		}
		$info=new Website();
		$info->where('name','open_time')->update(array('content'=>str_replace("\n","<br>",str_replace("\"", "'", trim(Input::get('open_time'))))));
		$info->where('name','gio_bao_hanh')->update(array('content'=>str_replace("\n","<br>",str_replace("\"", "'", trim(Input::get('gio_bao_hanh'))))));
		$info->where('name','sdt_dai_ly')->update(array('content'=>str_replace("\"", "'", trim(Input::get('sdt_dai_ly')))));
		$info->where('name','sdt_mua_hang_tu_xa')->update(array('content'=>trim(Input::get('sdt_mua_hang_tu_xa'))));

		$info->where('name','email_dai_ly')->update(array('content'=>trim(Input::get('email_dai_ly'))));

		$info->where('name','email_trung_tam_bao_hanh')->update(array('content'=>trim(Input::get('email_trung_tam_bao_hanh'))));

		$info->where('name','email_mua_hang_tu_xa')->update(array('content'=>trim(Input::get('email_mua_hang_tu_xa'))));


		$info->where('name','sdt_trung_tam_bh')->update(array('content'=>trim(Input::get('sdt_trung_tam_bh'))));
		$info->where('name','address')->update(array('content'=>str_replace("\n","<br>",trim(Input::get('address')))));


		return redirect('admin/info')->with(['message'=>'Cập nhật thành công thông tin mua/ban hàng.']);
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