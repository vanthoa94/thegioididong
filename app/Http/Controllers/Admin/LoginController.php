<?php

namespace App\Http\Controllers\Admin;

use Session;
use Input;
use App\Admin;
use Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class LoginController extends Controller
{
	public function index()
	{
		if (Auth::check())
		{
			$redirect=(Input::exists("redirect"))?('?redirect='.Input::get("redirect")):'';
			return redirect('admin'.$redirect);
		}

		
		return view("backend.login");
	}	

	public function login(Loginrequest $request)
	{
		if (Auth::attempt(['username' => trim($request->username), 'password' => trim($request->password)], $request->rememberme))
			{
				$user=Auth::user();
				if($user->block==1){
					Auth::logout();
					return redirect()->to('admin/login')->with(['message'=>'Tài khoản của bạn đã bị khóa.']);
				}
				try{
					Admin::where('id',$user->id)->update([
						'last_visit'=>$user->after_last_visit,
						'after_last_visit'=>Carbon::now()->toDateTimeString()
						]);
				}catch(\Exception $e){

				}
				$this->removecookie();
				$redirect=(Input::exists("redirect"))?('?redirect='.Input::get("redirect")):'';
			   return redirect('admin'.$redirect);
			}
			return redirect()->to('admin/login')->with(['message'=>'Tài khoản hoặc mật khẩu sai']);
	}

	private function removecookie(){
		try{
			if(\Cookie::has('role_data'))
				\Cookie::queue(\Cookie::forget('role_data'));
		}catch(\Exception $e){

		}
	}

	public function logout()
	{
		Auth::logout();
		$this->removecookie();
		
		return redirect('admin/login');
	}	
}

?>