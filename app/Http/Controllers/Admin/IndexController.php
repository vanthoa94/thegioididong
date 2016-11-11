<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use Carbon\Carbon;
use App\UserOnline;

class IndexController extends BaseController
{
	public function index()
	{
		$now=Carbon::now();
		$dt=array();
		$dt['data']=Admin::select(\DB::raw('(select sum(quantity) from statistics_online where id2 like "%'.$now->month.$now->year.'") as omonth,(select quantity from statistics_online where id2='.$now->day.$now->month.$now->year.') as oday,(select count(id) from user_online where TIMESTAMPDIFF(MINUTE,last_visit,CONVERT_TZ(NOW(),"-12:00","+10:00"))<6) as o,
			(select sum(quantity) from statistics_online) as s,(select count(id) from products) as sanpham,
			(select count(id) from news) as tintuc,
			(select count(id) from menus) as menu,
			(select count(id) from slideshows) as slide,
			(select count(id) from ads) as quangcao,
			(select count(id) from videos) as video,
			(select count(id) from pages) as page,
			(select count(id) from apps) as ungdung'))
		->first();
		try{
			UserOnline::whereRaw('TIMESTAMPDIFF(MINUTE,last_visit,CONVERT_TZ(NOW(),"-12:00","+10:00"))>30')->delete();
		}catch(\Exception $e){

		}

		
		$dt["year"]=$now->year;
		

		if(isset($_GET['thang']) && isset($_GET['nam'])){
			
			$dt["currentYear"]=(int)$_GET['nam'];
			$dt["currentMonth"]=(int)$_GET['thang'];
			if($dt["currentYear"]>$dt["year"] || $dt["currentYear"]<2016 || $dt["currentMonth"]<1 || $dt["currentMonth"]>12){
				$dt["currentYear"]=$dt['year'];
				$dt["currentMonth"]=$now->month;
			}
		}else{

			$dt["currentYear"]=$dt['year'];
			$dt["currentMonth"]=$now->month;
		}

		$dt['thongke']=\App\StatisticsOnline::selectRaw('mday as d,sum(quantity) as sl')->whereRaw("id2 like '%".$dt['currentMonth'].$dt['currentYear']."' group by mday")->get();
		
		return view("backend.index",$dt);
	}

	public function listonline(){
		return json_encode(UserOnline::select('last_visit','ip','position')->whereRaw('TIMESTAMPDIFF(MINUTE,last_visit,CONVERT_TZ(NOW(),"-12:00","+10:00"))<6')->get());
	}

	public function removecookie(){
		\Cookie::queue(\Cookie::forget('role_data'));
		return "ok";
	}
}

?>