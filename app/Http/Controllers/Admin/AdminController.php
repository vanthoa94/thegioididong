<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\GroupAdmin;
use App\Http\Requests\AdminRequest;
use Carbon\Carbon;


class AdminController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('admin/list')){
			return $this->ErrorPermission('Admin');
		}

		$data=Admin::where('id','<>',1)->orderBy('id','desc')->get();
		$listGroup=GroupAdmin::select('id','name')->get();

		return view("backend.admin.index",array('data'=>$data,'listGroup'=>$listGroup));
	}


	public function create(){
		if(!$this->checkPermission('admin/create')){
			return $this->ErrorPermission('Thêm Admin');
		}

		$data=GroupAdmin::select('id','name')->get();

		return view("backend.admin.create",array("data"=>$data));
	}

	private function CopyAvatar($name){
		copy(public_path().'/images/noavatar.png', public_path().'/images/avatar/'.$name);
	}

	public function postCreate(AdminRequest $request){

		if(!$this->checkPermission('admin/create')){
			return $this->ErrorPermission('Thêm admin');
		}

	
		if(Admin::select('id')->where('username',trim($request->username))->count()>0){
			return redirect()->to('admin/admin/create')->with(['message'=>'Username đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}


		$admin=new Admin();

		$admin->name=trim($request->name);
		$admin->username=trim($request->username);
		$admin->email=trim($request->email);
		$admin->phone=trim($request->phone);
		$admin->password=bcrypt(trim($request->password));
		$admin->group_id=$request->group_id;
		$admin->block=0;

		$admin->after_last_visit = Carbon::now()->toDateTimeString();
		$admin->last_visit=$admin->after_last_visit;

		if($admin->save()){
			$imagename = $admin->id.".jpg";
			try{
				if ($request->hasFile('avatar'))
			    {
			        $file = $request->file('avatar');
			        
			        $file->move(public_path().'/images/avatar/', $imagename);
			    }else{
			    	$this->CopyAvatar($imagename);
			    }
			}catch(\Exception $e){
				$this->CopyAvatar($imagename);
			}
			return redirect()->to('admin/admin/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/admin/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('admin/update')){
			return $this->ErrorPermission('Sửa admin');
		}

		if($id==1){
			return redirect()->to('admin/admin')->with(['message'=>'Admin không tồn tại.','message_type'=>'danger']);
		}

		$data=array();
		$data['data']=Admin::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/admin')->with(['message'=>'Admin không tồn tại.','message_type'=>'danger']);
		$data['group']=GroupAdmin::select('id','name')->get();
		return view('backend.admin.update',$data);
	}

	public function postUpdate(AdminRequest $request){

		if(!$this->checkPermission('admin/update')){
			return $this->ErrorPermission('Sửa admin');
		}

		

		if(Admin::select('id')->where('id','<>',(int)$request->id)->where('username',trim($request->username))->count()>0){
			return redirect()->to('admin/admin/'.$request->id)->with(['message'=>'Username đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$admin=Admin::find((int)$request->id);

		$admin->name=trim($request->name);
		$admin->username=trim($request->username);
		$admin->email=trim($request->email);
		$admin->phone=trim($request->phone);
		
		$admin->group_id=$request->group_id;
	
		
		if($admin->save()){
			$imagename = $request->id.".jpg";
			try{
				if ($request->hasFile('avatar'))
			    {
			        $file = $request->file('avatar');
			        
			        $file->move(public_path().'/images/avatar/', $imagename);
			    }
			}catch(\Exception $e){
				
			}
			return redirect()->to('admin/admin/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/admin/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function profile(){

		$data=array();
		$data['data']=Admin::find($this->idUser);
		if($data['data']==null)
			return redirect('admin')->with(['message'=>'Admin không tồn tại.','message_type'=>'danger']);
	

		return view('backend.admin.profile',$data);
	}

	public function postProfile(AdminRequest $request){

		if(Admin::select('id')->where('id','<>',(int)$request->id)->where('username',trim($request->username))->count()>0){
			return redirect()->to('admin/profile')->with(['message'=>'Username đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$admin=Admin::find((int)$request->id);

		$admin->name=trim($request->name);
		$admin->username=trim($request->username);
		$admin->email=trim($request->email);
		$admin->phone=trim($request->phone);
	
		
		if($admin->save()){
			$imagename = $request->id.".jpg";
			try{
				if ($request->hasFile('avatar'))
			    {
			        $file = $request->file('avatar');
			        
			        $file->move(public_path().'/images/avatar/', $imagename);
			    }
			}catch(\Exception $e){
				
			}
			return redirect()->to('admin/profile')->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/profile')->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function changepass(){

		return view('backend.admin.changepass');
	}

	public function postChange(\Illuminate\Http\Request $request){

		if(trim($request->passwordold)=="" || trim($request->passwordnew=="")){
			return redirect()->to('admin/changepass')->with(['message'=>'Vui lòng nhập đây đủ thông tin.','message_type'=>'danger']);
		}

		if(trim($request->passwordnew)!=trim($request->repassword)){
			return redirect()->to('admin/changepass')->with(['message'=>'Nhập lại mật khẩu sai.','message_type'=>'danger']);
		}

		$admin=Admin::find($this->idUser);

		if(\Hash::check(trim($request->passwordold),$admin->password)){
			$admin->password=bcrypt(trim($request->passwordnew));

			if($admin->save()){
				return redirect()->to('admin/changepass')->with(['message'=>'Cập nhật mật khẩu thành công.']);	
			}

			return redirect()->to('admin/changepass')->with(['message'=>'Có lỗi. Cập nhật mật khẩu thất bại.','message_type'=>'danger']);	
		}

		return redirect()->to('admin/changepass')->with(['message'=>'Password cũ sai.','message_type'=>'danger']);	

		
	}

	public function postDelete(){

		if(!$this->checkPermission('admin/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if($id==1){
			return json_encode(["success"=>false,"message"=>"Không được phép xóa admin."]);
		}

		if(Admin::destroy($id)){
			try{
				$filename=public_path().'/images/avatar/'.$id.".jpg";
				if(\File::exists($filename)){
					\File::delete($filename);
				}
			}catch(\Exception $e){

			}
			return json_encode(["success"=>true,"message"=>"Xóa thành công admin {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa admin {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('admin/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));
		$newId=array();
		foreach($id as $i){
			if($i!=1){
				$newId[]=$i;
			}
		}

		if(Admin::destroy($newId)){
			foreach($newId as $i){
				try{
					$filename=public_path().'/images/avatar/'.$i.".jpg";
					if(\File::exists($filename)){
						\File::delete($filename);
					}
				}catch(\Exception $e){

				}
			}
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." người dùng."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa người dùng thất bại"]);
	}

	public function block(){
		if(!$this->checkPermission('admin/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền khóa"]);
		}
		$id=(int)\Input::get('data');
		$block=\Input::get('ischeck');

		$block=($block=='true')?1:0;

		if(Admin::where('id',$id)->update(['block'=>$block])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function postBlocks(){
		if(!$this->checkPermission('admin/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền khóa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			Admin::where('id',(int)$item)->update(['block'=>1]);
		}


		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function postUnlocks(){
		if(!$this->checkPermission('admin/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền mở khóa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			Admin::where('id',(int)$item)->update(['block'=>0]);
		}


		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function reset(){
		if(!$this->checkPermission('admin/reset')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền reset pass"]);
		}

		$id=(int)\Input::get('data');
		$pass=trim(\Input::get('pass'));

		if($pass==""){
			return json_encode(["success"=>false,"message"=>"Vui lòng nhập mật khẩu mới"]);
		}

		if(Admin::where('id',$id)->update(['password'=>bcrypt($pass)])){
			return json_encode(["success"=>true,"message"=>"Cập nhật mật khẩu thành công"]);
		}else{
			return json_encode(["success"=>false,"message"=>"Cập nhật mật khẩu thất bại"]);
		}
	}
}

?>