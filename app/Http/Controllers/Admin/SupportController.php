<?php

namespace App\Http\Controllers\Admin;
use App\Support;
use App\Http\Requests\SupportRequest;


class SupportController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('support/list')){
			return $this->ErrorPermission('Hỗ trợ');
		}

		$data=Support::orderBy('id','desc')->get();
		
		return view("backend.support.index",array('data'=>$data));
	}

	public function create(){
		if(!$this->checkPermission('support/create')){
			return $this->ErrorPermission('Thêm hỗ trợ');
		}

		return view("backend.support.create");
	}

	public function postCreate(SupportRequest $request){
		if(!$this->checkPermission('support/create')){
			return $this->ErrorPermission('Thêm hỗ trợ');
		}
		$support=new Support();
		$support->fill($request->all());
		$support->display=1;
		if($support->save()){
			return redirect()->to('admin/support/create')->with('message','Thêm thành công.');
		}

		return redirect()->to('admin/agency/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger'])->withInput($request->all());
	}

	public function update($id){

		if(!$this->checkPermission('support/update')){
			return $this->ErrorPermission('Sửa hỗ trợ');
		}

		$data=array();
		$data['data']=Support::find((int)$id);

		if($data['data']==null)
			return redirect()->to('admin/support')->with(['message'=>'Hỗ trợ không tồn tại.','message_type'=>'danger']);
		
		return view('backend.support.update',$data);
	}

	public function postUpdate(SupportRequest $request){

		if(!$this->checkPermission('support/update')){
			return $this->ErrorPermission('Sửa hỗ trợ');
		}

		$support=Support::find((int)$request->id);

		if($support==null)
			return redirect()->to('admin/support')->with(['message'=>'Hỗ trợ không tồn tại.','message_type'=>'danger']);

		$support->fill($request->except('id'));
	
		
		if($support->save()){
			return redirect()->to('admin/support/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/support/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('support/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Support::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công hỗ trợ {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa hỗ trợ {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('support/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Support::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." hỗ trợ."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa hỗ trợ thất bại"]);
	}
	public function display(){
		if(!$this->checkPermission('support/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Support::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}
}

?>