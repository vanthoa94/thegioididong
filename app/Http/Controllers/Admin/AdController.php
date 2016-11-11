<?php

namespace App\Http\Controllers\Admin;
use App\Ads;
use App\Http\Requests\AdRequest;


class AdController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('ad/list')){
			return $this->ErrorPermission('Quảng cáo');
		}

		$data=Ads::orderBy('id','desc')->get();

		return view("backend.ad.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('ad/create')){
			return $this->ErrorPermission('Thêm quảng cáo');
		}


		return view("backend.ad.create");
	}

	public function postCreate(AdRequest $request){

		if(!$this->checkPermission('ad/create')){
			return $this->ErrorPermission('Thêm quảng cáo');
		}

		$ad=new Ads();


		$ad->title=str_replace("\"", "'", trim($request->title));

		
		$ad->url=$request->url;
		$ad->image=$request->image;
		$ad->position=(int)$request->position;
		
		$ad->display=1;

		if($ad->save()){
			return redirect()->to('admin/ad/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/ad/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('ad/update')){
			return $this->ErrorPermission('Sửa quảng cáo');
		}

		$data=array();
		$data['data']=Ads::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/ad')->with(['message'=>'Quảng cáo không tồn tại.','message_type'=>'danger']);
		
		return view('backend.ad.update',$data);
	}

	public function postUpdate(AdRequest $request){

		if(!$this->checkPermission('ad/update')){
			return $this->ErrorPermission('Sửa quảng cáo');
		}

		$ad=Ads::find((int)$request->id);
		$ad->title=str_replace("\"", "'", trim($request->title));

		
		$ad->url=$request->url;
		$ad->image=$request->image;
		$ad->position=(int)$request->position;
		
		
		if($ad->save()){
			return redirect()->to('admin/ad/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/ad/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('ad/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Ads::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công quảng cáo {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa quảng cáo {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('ad/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Ads::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." quảng cáo."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa quảng cáo thất bại"]);
	}

	public function display(){

		if(!$this->checkPermission('ad/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}

		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Ads::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}
}

?>