<?php

namespace App\Http\Controllers\Admin;
use App\Agency;
use App\Branch;
use App\Http\Requests\AgencyRequest;


class AgencyController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('agency/list')){
			return $this->ErrorPermission('Đại lý');
		}

		$data=Agency::orderBy('id','desc')->get();

		$listBranch=Branch::select('id','name')->get();
		
		return view("backend.agency.index",array('data'=>$data,'listBranch'=>$listBranch));
	}

	public function create(){
		if(!$this->checkPermission('agency/create')){
			return $this->ErrorPermission('Thêm đại lý');
		}

		$data=Branch::select('id','name')->get();

		return view("backend.agency.create",array('data'=>$data));
	}

	public function postCreate(AgencyRequest $request){
		if(!$this->checkPermission('agency/create')){
			return $this->ErrorPermission('Thêm đại lý');
		}
		$agency=new Agency();
		$agency->fill($request->all());
		$agency->display_footer=($request->display_footer=='on')?1:0;
		if($agency->save()){
			return redirect()->to('admin/agency/create')->with('message','Thêm thành công.');
		}

		return redirect()->to('admin/agency/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger'])->withInput($request->all());
	}

	public function update($id){

		if(!$this->checkPermission('agency/update')){
			return $this->ErrorPermission('Sửa đại lý');
		}

		$data=array();
		$data['data']=Agency::find((int)$id);

		if($data['data']==null)
			return redirect()->to('admin/agency')->with(['message'=>'Đại lý không tồn tại.','message_type'=>'danger']);
		$data['listBranch']=Branch::select('id','name')->get();
		return view('backend.agency.update',$data);
	}

	public function postUpdate(AgencyRequest $request){

		if(!$this->checkPermission('agency/update')){
			return $this->ErrorPermission('Sửa đại lý');
		}

		$agency=Agency::find((int)$request->id);

		if($agency==null)
			return redirect()->to('admin/agency')->with(['message'=>'Đại lý không tồn tại.','message_type'=>'danger']);

		$agency->fill($request->except('id'));
		$agency->display_footer=($request->display_footer=='on')?1:0;
		
		if($agency->save()){
			return redirect()->to('admin/agency/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/agency/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('agency/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Agency::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công đại lý {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa đại lý {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('agency/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Agency::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." đại lý."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa đại lý thất bại"]);
	}
	public function display_footer(){
		if(!$this->checkPermission('agency/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display_footer=\Input::get('ischeck');

		$display_footer=($display_footer=='true')?1:0;

		if(Agency::where('id',$id)->update(['display_footer'=>$display_footer])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}
}

?>