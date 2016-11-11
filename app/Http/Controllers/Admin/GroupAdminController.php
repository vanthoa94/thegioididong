<?php

namespace App\Http\Controllers\Admin;
use App\GroupAdmin;
use App\GroupRole;
use App\Role;
use App\Admin;
use App\AdminGroupRole;
use App\Http\Requests\GroupAdminRequest;


class GroupAdminController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('groupadmin/list')){
			return $this->ErrorPermission('Nhóm Admin');
		}

		$data=GroupAdmin::select('id','name',\DB::raw('(select count(id) from admins where group_id=group_admins.id) as count'))->orderBy('id','desc')->get();
		
		return view("backend.groupadmin.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('groupadmin/create')){
			return $this->ErrorPermission('Thêm nhóm admin');
		}

		$grouprole=GroupRole::all();
		$roles=Role::all();

		return view("backend.groupadmin.create",array('grouprole'=>$grouprole,'roles'=>$roles));
	}

	public function postCreate(GroupAdminRequest $request){

		if(!$this->checkPermission('groupadmin/create')){
			return $this->ErrorPermission('Thêm nhóm admin');
		}

		$group=new GroupAdmin();


		$group->name=str_replace("\"", "'", trim($request->name));

		if($group->save()){

			if($request->has('CheckRoles')){
				$arr=array();
				foreach($request->CheckRoles as $item){
					$a=array();
					$a['group_id']=$group->id;
					$a['role_id']=$item;

					$arr[]=$a;
				}

				AdminGroupRole::insert($arr);
			}

			return redirect()->to('admin/group-admin/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/group-admin/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
		
		
	}

	public function update($id){

		if(!$this->checkPermission('groupadmin/update')){
			return $this->ErrorPermission('Sửa nhóm admin');
		}

		$data=array();
		$data['data']=GroupAdmin::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/group-admin')->with(['message'=>'Nhóm admin không tồn tại.','message_type'=>'danger']);
			
		$data['grouprole']=GroupRole::all();
		$data['roles']=Role::all();

		$data['admingrouprole']=AdminGroupRole::select('role_id')->where('group_id',$id)->get()->toArray();
		
		return view('backend.groupadmin.update',$data);
	}

	public function postUpdate(GroupAdminRequest $request){

		if(!$this->checkPermission('groupadmin/update')){
			return $this->ErrorPermission('Sửa nhóm admin');
		}

		$group=GroupAdmin::find((int)$request->id);

		if($group==null){
			return redirect()->to('admin/group-admin')->with(['message'=>'Nhóm admin không tồn tại.','message_type'=>'danger']);
		}

		$group->name=str_replace("\"", "'", trim($request->name));

		if($group->save()){

			if((int)$request->id!=1){
				AdminGroupRole::where('group_id',(int)$request->id)->delete();

				if($request->has('CheckRoles')){
					$arr=array();
					foreach($request->CheckRoles as $item){
						$a=array();
						$a['group_id']=(int)$request->id;
						$a['role_id']=$item;

						$arr[]=$a;
					}

					AdminGroupRole::insert($arr);
				}
			}

			return redirect()->to('admin/group-admin/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/group-admin/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
		
		
	}

	public function postDelete(){

		if(!$this->checkPermission('groupadmin/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Admin::where('group_id',$id)->count('id')>0){
			return json_encode(["success"=>false,"message"=>"Đã có thành viên trong nhóm. Không thể xóa"]);
		}

		AdminGroupRole::where('group_id',$id)->delete();
		
		if(GroupAdmin::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công nhóm {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa nhóm {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('groupadmin/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		$count=0;

		foreach($id as $i){
			try{
				AdminGroupRole::where('group_id',$i)->delete();
				if(GroupAdmin::destroy($i)){
						$count++;
					}
			}catch(\Exception $e){}
		}

		return json_encode(["success"=>true,"message"=>"Xóa thành công ".$count." nhóm."]);
	}

	
}

?>