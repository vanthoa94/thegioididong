<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Carbon\Carbon;
use App\UserOnline;
use App\StatisticsOnline;

class CountUserOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $total=1000;
        try{
            $now=Carbon::now();
            //user online
            if(Cookie::has("uon")){
                //lấy dữ liệu lưu trong cookie và parse json sang array
                $data=json_decode(Cookie::get('uon'));
                //lưu lại lần update cuối. nếu lớn hơn 10 phút thì cập nhật lại
                $phut=0;
                if($data->hours==$now->hour){
                    $phut=$now->minute-$data->minutes;
                }else{
                    $phut=($now->minute+60)-$data->minutes;
                }
                if($phut>=5){
                    $total=StatisticsOnline::sum('quantity');
                    $data->minutes=$now->minute;
                    $data->hours=$now->hour;
                    $data->total=$total;
                    
                    Cookie::queue('uon', json_encode($data),20);
                    
                    UserOnline::where('id2',$data->id)->update(['last_visit'=>$now->toDateTimeString()]);   
                }else{
                    $total=$data->total;
                }
            }else{
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $id= $now->day.$now->month.$now->year.$now->hour.$now->minute.$now->second.rand(0,9);
                $total=StatisticsOnline::sum('quantity');
                $usero=new UserOnline();
                $usero->id2=$id;
                $usero->last_visit=$now->toDateTimeString();
                $usero->ip=$ip;
                $usero->position="";
                
                
                if($usero->save()){ 

                    $data=array('id'=>$id,'minutes'=>$now->minute,'hours'=>$now->hour,'total'=>$total);
                    Cookie::queue('uon', json_encode($data),20);


                    $s=StatisticsOnline::where('id2',$now->day.$now->month.$now->year)->first();
                    if($s==null){
                        $ss=new StatisticsOnline();
                        $ss->quantity=1;
                        $ss->id2=$now->day.$now->month.$now->year;
                        $ss->mday=$now->day;

                        $ss->save();
                    }else{
                        $s->quantity=$s->quantity+1;
                        $s->save();
                    }

                   
                }
            }
        }catch(\Exception $e){

        }

        $current=UserOnline::whereRaw("TIMESTAMPDIFF(MINUTE,last_visit,CONVERT_TZ(NOW(),'-12:00','+10:00'))<6")->count('id');

        \View::share('count_user_online',["current"=>$current,"total"=>$total]);

        return $next($request);
    }
}
