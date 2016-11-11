<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Requests\UserRequest;


class UserController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('user/list')){
			return $this->ErrorPermission('Người dùng');
		}

		$data=User::orderBy('id','desc')->get();

		return view("backend.user.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('user/create')){
			return $this->ErrorPermission('Người dùng');
		}

		return view("backend.user.create");
	}

	public function postCreate(UserRequest $request){

		if(!$this->checkPermission('user/create')){
			return $this->ErrorPermission('Thêm người dùng');
		}

		$user=new User();

		$user->fill($request->all());

		$user->username=trim($request->username);
		$user->password=\Hash::make(trim($request->password));

		if(User::select('id')->where('username',$request->username)->count()>0){
			return redirect()->to('admin/user/create')->with(['message'=>'Username đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		

		if($user->save()){
			return redirect()->to('admin/user/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/user/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('user/update')){
			return $this->ErrorPermission('Sửa người dùng');
		}

		$data=array();
		$data['data']=User::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/user')->with(['message'=>'Người dùng không tồn tại.','message_type'=>'danger']);
		
		return view('backend.user.update',$data);
	}

	public function postUpdate(UserRequest $request){

		if(!$this->checkPermission('user/update')){
			return $this->ErrorPermission('Sửa người dùng');
		}

		$user=User::find((int)$request->id);

		$user->fill($request->all());

		$user->username=trim($request->username);
	
		if(User::select('id')->where('id','<>',(int)$request->id)->where('username',$request->username)->count()>0){
			return redirect()->to('admin/user/'.$request->id)->with(['message'=>'Username đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}
		
		
		if($user->save()){
			return redirect()->to('admin/user/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/user/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('user/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(User::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công người dùng {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa người dùng {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('user/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(User::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." người dùng."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa người dùng thất bại"]);
	}

	public function block(){
		if(!$this->checkPermission('user/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền khóa"]);
		}
		$id=(int)\Input::get('data');
		$block=\Input::get('ischeck');

		$block=($block=='true')?1:0;

		if(User::where('id',$id)->update(['block'=>$block])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function postBlocks(){
		if(!$this->checkPermission('user/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền khóa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			User::where('id',(int)$item)->update(['block'=>1]);
		}


		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function postUnlocks(){
		if(!$this->checkPermission('user/block')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền mở khóa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			User::where('id',(int)$item)->update(['block'=>0]);
		}


		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function reset(){
		if(!$this->checkPermission('user/reset')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền reset pass"]);
		}

		$id=(int)\Input::get('data');
		$pass=trim(\Input::get('pass'));

		if($pass==""){
			return json_encode(["success"=>false,"message"=>"Vui lòng nhập mật khẩu mới"]);
		}

		if(User::where('id',$id)->update(['password'=>\Hash::make($pass)])){
			return json_encode(["success"=>true,"message"=>"Cập nhật mật khẩu thành công"]);
		}else{
			return json_encode(["success"=>false,"message"=>"Cập nhật mật khẩu thất bại"]);
		}
	}
}

?>