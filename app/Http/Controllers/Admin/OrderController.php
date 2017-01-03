<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use App\Http\Requests\AdRequest;


class OrderController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('order/list')){
			return $this->ErrorPermission('Quảng cáo');
		}

		$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');

		$currentDate=$dt->day.'/'.$dt->month.'/'.$dt->year;

		$data=Order::select('mua_sach.id','mua_sach.book_id','mua_sach.user_id','mua_sach.active','mua_sach.viewer','mua_sach.viewer_day','mua_sach.ip_mua','mua_sach.gia_mua','mua_sach.created_at','mua_sach.updated_at','books.name as book_name','users.name as username','users.email','users.phone')->join('books','books.id','=','mua_sach.book_id')->join('users','users.id','=','mua_sach.user_id')->orderBy('active')->orderBy('id','desc')->get();

		return view("backend.order.list",array('data'=>$data,'currentDate'=>$currentDate));
	}


	public function postDelete(){

		if(!$this->checkPermission('order/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Order::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công đơn đăng ký {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa đơn đăng ký {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('order/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Order::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." đơn đăng ký."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa đơn đăng ký thất bại"]);
	}

	public function active(){

		if(!$this->checkPermission('order/active')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}

		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');

		if(Order::where('id',$id)->update(['active'=>$display,'updated_at'=>$dt->year.'-'.$dt->month.'-'.$dt->day.' '.$dt->hour.':'.$dt->minute.':'.$dt->second])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function actives(){
		if(!$this->checkPermission('order/active')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		Order::whereIn('id',$data)->update(['active'=>1,'updated_at'=>$dt->year.'-'.$dt->month.'-'.$dt->day.' '.$dt->hour.':'.$dt->minute.':'.$dt->second]);

		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function deactives(){
		if(!$this->checkPermission('order/active')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		Order::whereIn ('id',$data)->update(['active'=>0]);

		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}
}

?>