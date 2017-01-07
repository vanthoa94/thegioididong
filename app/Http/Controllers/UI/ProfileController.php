<?php

namespace App\Http\Controllers\UI;
use App\User;
use App\Http\Requests\GroupAdminRequest;

class ProfileController extends BaseController
{
	public function getIndex(){
		$user_id=$this->isLogin();

		if($user_id==0){
			return redirect()->back();
		}

		$info=User::select('id','name','email','phone','address','gender')->where('id',$user_id)->first();

		if($info==null){
			return redirect()->back();
		}

		return view('ui.profile',array('info'=>$info));
	}

	public function postIndex(GroupAdminRequest $request){

		$user_id=$this->isLogin();

		if($user_id==0)
			return redirect('/');


		$user=User::find($user_id);
		$user->name=trim($request->name);
		$user->phone=trim($request->phone);
		$user->address=trim($request->address);
		$user->gender=(int)$request->gender;

		$user->save();
		
		
		return redirect()->to('user/profile');
	}

	public function getCreateBook(){
		$user_id=$this->isLogin();

		if($user_id==0)
			return redirect('/');

		return view('ui.user.create_book');
	}

	public function postCreateBook(){

	}
}