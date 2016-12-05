<?php

namespace App\Http\Controllers\UI;
use Illuminate\Routing\Controller;


class UserController extends Controller
{

	public function login(){
		return view('ui.login');
	}


	public function logout(){
		if(\Session::get('loginuser')){
			\Session::forget('loginuser');
		}

		return "OK";
	}


	public function postLogin(){
		if(\Request::json()){
			$rules=array(
				'id'=>'required',
				'type'=>'required',
				'name'=>'required',
				'email'=>'required|email'
			);

			$validator = \Validator::make(\Request::all(), $rules);

			if ($validator->fails())
			{
				return json_encode(array("success"=>false,"message"=>"Lỗi đăng nhập. Vui lòng thử lại."));
			}

			$email=trim(\Request::get('email'));
			$id=trim(\Request::get('id'));
			$name=trim(\Request::get('name'));
			$gender=trim(\Request::get('gender'));


			$current_user=\App\User::select('id','block')->where('username',$id)->where('email',$email)->first();
			if($current_user!=null){
				if($current_user->block==1){
					return json_encode(array("success"=>true,"block"=>true));
				}

				 \Session::put('loginuser',$current_user->id);

				 \App\User::where('id',$current_user->id)->update(array('block'=>$current_user->block));

				 return json_encode(array("success"=>true));
			}else{
				$user=new \App\User();

				$user->name=$name;
				$user->username=$id;
				$user->email=$email;
				$user->password="ojhsdfosaodfgso";
				$user->phone="";
				$user->address="";
				$user->gender=($gender=="" || $gender=="male")?1:0;

				$user->block=0;
				$user->remember_token=\Request::get('type');

				if($user->save()){

					\Session::put('loginuser',$user->id);

					return json_encode(array("success"=>true));
				}

				return json_encode(array("success"=>false,"message"=>'Có lỗi. Không thể tạo tài khoản. Vui lòng thử lại.'));
			}

		}
	}
}