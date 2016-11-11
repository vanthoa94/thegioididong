<?php

namespace App\Http\Controllers\Admin;
use App\Branch;
use App\Http\Requests\BranchRequest;


class BranchController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('branch/list')){
			return $this->ErrorPermission('Chi nhánh');
		}

		$data=Branch::orderBy('id','desc')->get();
		
		return view("backend.branch.index",array('data'=>$data));
	}

	public function create(){
		if(!$this->checkPermission('branch/create')){
			return $this->ErrorPermission('Thêm chi nhánh');
		}

		return view("backend.branch.create");
	}

	public function postCreate(BranchRequest $request){
		if(!$this->checkPermission('branch/create')){
			return $this->ErrorPermission('Thêm chi nhánh');
		}
		$branch=new Branch();
		$branch->fill($request->all());

		if($branch->save()){
			return redirect()->to('admin/branch/create')->with('message','Thêm thành công.');
		}

		return redirect()->to('admin/branch/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger'])->withInput($request->all());
	}

	public function update($id){

		if(!$this->checkPermission('branch/update')){
			return $this->ErrorPermission('Sửa chi nhánh');
		}

		$data=array();
		$data['data']=Branch::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/branch')->with(['message'=>'Chi nhánh không tồn tại.','message_type'=>'danger']);
	
		return view('backend.branch.update',$data);
	}

	public function postUpdate(BranchRequest $request){

		if(!$this->checkPermission('branch/update')){
			return $this->ErrorPermission('Sửa chi nhánh');
		}

		$branch=Branch::find((int)$request->id);
		if($branch==null)
			return redirect()->to('admin/branch')->with(['message'=>'Chi nhánh không tồn tại.','message_type'=>'danger']);
		
		$branch->fill($request->except('id'));
		
		if($branch->save()){
			return redirect()->to('admin/branch/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/branch/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('branch/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(\App\Agency::where('branch_id',$id)->count('id')>0){
			return json_encode(["success"=>false,"message"=>"Đã có đại lý thuộc chi nhánh {name}. Không thể xóa."]);
		}

		if(Branch::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công chi nhánh {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa chi nhánh {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('branch/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		$arr_del=array();

		foreach($id as $i){
			if(\App\Agency::where('branch_id',$i)->count('id')==0){
				$arr_del[]=$i;
			}
		}

		if(Branch::destroy($arr_del)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($arr_del)." chi nhánh.","idSuccess"=>$arr_del]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa chi nhánh thất bại"]);
	}
	public function sort(){
		if(!$this->checkPermission('branch/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			Branch::where('id',$value)->update(['index'=>$data[$key]]);
		}

		return json_encode(["success"=>true]);
	}
}

?>