<?php

namespace App\Http\Controllers\UI;
use Illuminate\Routing\Controller;
use App\Http\Requests\MuaSachRequest;
use Session;
use App\Order;
use App\User;


class MuaSachController extends Controller
{
	
	public function index(MuaSachRequest $request)
	{
		$user_id=0;
		if(Session::get('loginuser')!=null){
            $user_id=Session::get('loginuser');
        }

        if($user_id==0){
        	return json_encode(array(
        		'success'=>false,
        		'message'=>'Vui lòng đăng nhập để mua sách.'
        	));
        }

        $order=new Order();

        $order->user_id=$user_id;
        $order->book_id=(int)$request->book_id;
        $order->active=0;
        $order->viewer=0;
        $order->viewer_day=0;

        $dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
        

        $order->viewer_date= $dt->day.''.$dt->month.''.$dt->year;

        $order->ip_mua=$request->ip();
        $order->ip_doc="";
        $order->da_xem=0;
        $order->gia_mua=$request->price;
        $order->created_at=$dt->year.'-'.$dt->month.'-'.$dt->day.' '.$dt->hour.':'.$dt->minute.':'.$dt->second;

        if($order->save()){
            $email=User::select('email')->where('id',$user_id)->first();
            Session::flash('successs_message',$email->email.'|'.$order->id);
            return json_encode(array(
                'success'=>true
            ));
        }else{
            return json_encode(array(
                'success'=>false,
                'message'=>'Đăng ký mua sách thất bại. Vui lòng thử lại.'
            ));
        }

	}

    public function checkMuaSach(){
        $user_id=0;
        if(Session::get('loginuser')!=null){
            $user_id=Session::get('loginuser');
        }

        if($user_id==0)
           return json_encode("C");
        else{
            $book_id=\Input::get('book_id');
            if(Order::select('id')->where('user_id',$user_id)->where('book_id',$book_id)->count()>0){
                return json_encode("OK");
            }else{
               return json_encode("C");
            }
        }

    }

    public function huy(){
        $id=\Input::get('id');

        if($id==null){
            return json_encode(array(
                'success'=>false,
                'message'=>'Hủy đăng ký mua sách thất bại. Vui lòng thử lại.'
            ));
        }
        if(Order::destroy($id)){
            return json_encode(array(
                'success'=>true
            ));
        }

        return json_encode(array(
            'success'=>false,
            'message'=>'Hủy đăng ký mua sách thất bại. Vui lòng thử lại.'
        ));
    }

    public function position_user(){
       if(\Cookie::has("uon")){
            $data=json_decode(\Cookie::get('uon'));

            if(isset($data->pageId)){
                if($data->pageId==\Input::get('pageId')){
                    return 0;
                }
            }

            $page=trim(\Input::get("page"));
            $url=\Input::get('url');


            if($page=="")
                $page="Trang chủ";
                
            \App\UserOnline::where('id2',$data->id)->update(['position'=>$page]);
            $data->pageId=\Input::get('pageId');
            \Cookie::queue('uon', json_encode($data),20);
        }
    }
}