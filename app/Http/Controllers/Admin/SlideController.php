<?php

namespace App\Http\Controllers\Admin;
use App\SlideShow;
use App\Page;
use App\Http\Requests\SlideRequest;


class SlideController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('slide/list')){
			return $this->ErrorPermission('SlideShow');
		}

		$data=SlideShow::orderBy('id','desc')->get();

		return view("backend.slide.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('slide/create')){
			return $this->ErrorPermission('Thêm slide');
		}
		
		return view("backend.slide.create");
	}

	public function postCreate(SlideRequest $request){

		if(!$this->checkPermission('slide/create')){
			return $this->ErrorPermission('Thêm slide');
		}

		$slide=new SlideShow();


		$slide->title=str_replace("\"", "'", trim($request->title));

		
		$slide->url=$request->url;
		$slide->image=$request->image;
		
		$slide->display=1;
		$slide->index=0;

		if($slide->save()){
			return redirect()->to('admin/slide/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/slide/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('slide/update')){
			return $this->ErrorPermission('Sửa slide');
		}

		$data=array();
		$data['data']=SlideShow::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/slide')->with(['message'=>'Slide không tồn tại.','message_type'=>'danger']);
		
		return view('backend.slide.update',$data);
	}

	public function postUpdate(SlideRequest $request){

		if(!$this->checkPermission('slide/update')){
			return $this->ErrorPermission('Sửa SlideShow');
		}

		$slide=SlideShow::find((int)$request->id);
		$slide->title=str_replace("\"", "'", trim($request->title));

		
		$slide->url=$request->url;
		$slide->image=$request->image;
		
		if($slide->save()){
			return redirect()->to('admin/slide/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/slide/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('slide/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(SlideShow::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công slide {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa slide {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('slide/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(SlideShow::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." slide."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa slide thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('slide/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(SlideShow::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('slide/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			SlideShow::where('id',$value)->update(['index'=>$data[$key]]);
		}

		return json_encode(["success"=>true]);
	}
}

?>