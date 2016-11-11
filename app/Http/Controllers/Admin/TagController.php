<?php

namespace App\Http\Controllers\Admin;
use App\Tag;
use App\Http\Requests\TagRequest;


class TagController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('tag/list')){
			return $this->ErrorPermission('Tag');
		}

		$data=Tag::orderBy('id','desc')->get();
		
		return view("backend.tag.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('tag/create')){
			return $this->ErrorPermission('Thêm tag');
		}

		return view("backend.tag.create");
	}

	public function postCreate(TagRequest $request){

		if(!$this->checkPermission('tag/create')){
			return $this->ErrorPermission('Thêm tag');
		}

		$tag=new Tag();

		$tag->url=$request->url;
		
		$tag->name=trim($request->name);
		$tag->index=0;
		$tag->display=1;

		if($tag->save()){
			return redirect()->to('admin/tag/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/tag/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('tag/update')){
			return $this->ErrorPermission('Sửa tag');
		}

		$data=array();
		$data['data']=Tag::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/tag')->with(['message'=>'Tag không tồn tại.','message_type'=>'danger']);
		
		return view('backend.tag.update',$data);
	}

	public function postUpdate(TagRequest $request){

		if(!$this->checkPermission('tag/update')){
			return $this->ErrorPermission('Sửa tag');
		}

		$tag=Tag::find((int)$request->id);
		if($tag==null)
			return redirect()->to('admin/tag')->with(['message'=>'tag không tồn tại.','message_type'=>'danger']);
		
		
		$tag->url=trim($request->url);
		$tag->name=trim($request->name);
		
		if($tag->save()){
			return redirect()->to('admin/tag/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/tag/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('tag/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Tag::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công tag {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa tag {name} thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('tag/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Tag::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('tag/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			Tag::where('id',$value)->update(['index'=>$data[$key]]);
		}

		return json_encode(["success"=>true]);
	}
}

?>