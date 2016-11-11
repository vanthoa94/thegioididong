<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Auth;
use App\AdminGroupRole;
use Cookie;

class BaseController extends Controller
{
	protected $idUser=0;
	private $idGroupAdmin=0;
	public function __construct(){
		$user=Auth::user();
		if($user->block==1){
			header('Location: '.url('error/account'));
			exit();
		}
		
		$this->idUser=$user->id;

		
		$this->idGroupAdmin=$user->group_id;

		$role_data="";

		if(!Cookie::has('role_data')){
			$role_data=$this->getRoleData();
		}else{
			$role_data=Cookie::get('role_data');
		}

		view()->share('admin_info',['id'=>$user->id,'name'=>$user->name,'last_visit'=>date('d/m/Y H:i',strtotime($user->last_visit)),'role'=>$role_data]);

		$user=null;
		$role_data=null;
	}
	protected function checkPermission($key)
	{
		return AdminGroupRole::select('admin_group_role.id')->join('roles','roles.id','=','admin_group_role.role_id')->where('admin_group_role.group_id',$this->idGroupAdmin)->where('roles.key',$key)->count()>0;
	}

	private function getRoleData(){
		$data = AdminGroupRole::select('roles.key')->join('roles','roles.id','=','admin_group_role.role_id')->where('admin_group_role.group_id',$this->idGroupAdmin)->get();
		$text="[";
		foreach($data as $item){
			$text .= "{\"data\":\"" . $item->key . "\"},";
		}

		if ($text != "[")
        {
            $text = substr($text, 0,strlen($text)-1);
        }

        $text .= "]";

        Cookie::queue('role_data', $text,60);

        return $text;
	}

	protected function ErrorPermission($page=''){
		return redirect('error/permission?page='.$page);
	}


	protected function KhongDau($str){
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);

		return $str;
	}

	protected function formatToUrl($name){

		$name=$this->KhongDau(trim(mb_strtolower($name,'UTF-8')));

		if (preg_match_all("/[a-za-z0-9- ]*/", $name, $matches)) {
			$str="";
			foreach($matches[0] as $value)
	        {
	        	$str.=$value;
	        }

			$str=str_replace(" ", "-", $str);
			$str=str_replace("--", "-", $str);
			$str=str_replace("--", "-", $str);
			return $str;		  
		}



		return $name;

	}
}

?>