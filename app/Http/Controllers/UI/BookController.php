<?php

namespace App\Http\Controllers\UI;
use App\Product;
use App\MucLuc;
use App\Ads;
use App\Order;


class BookController extends BaseController
{
	protected $loadNewBook=true;

	public function index($url)
	{
		$info=Product::select('id','cate_id','name','url','image','price','price_pro','description','keywords','status','viewer','promotion','author','ngaydoc','doctn')->where('url',$url)->first();
		if($info==null){
			return view("errors.404");
		}
		$data=array();

		$data['info']=$info;

		$user_id=$this->isLogin();
		if($user_id==0){
			$data['chuamua']=true;
			$data['dakichhoat']=false;	
		}else{
			$order=Order::select('id','active','gia_mua','created_at')->where('user_id',$user_id)->where('book_id',$info->id)->first();
			if($order==null){
				$data['chuamua']=true;
				$data['dakichhoat']=false;	
			}else{
				$data['chuamua']=false;
				$data['dakichhoat']=$order->active==1;
				$data['gia_mua']=$order->gia_mua;
				$data['ngay_mua_sach']=$order->created_at;
				$data['id_dk']=$order->id;
			}
		}

		$cothemuondoc=Product::select('name','url','image','price','price_pro','author','viewer')->where('display',1)->where('cate_id',$info->cate_id)->where('id','<>',$info->id)->orderBy('viewer','desc')->limit(3)->get();
           

		$data['cothemuondoc']=$cothemuondoc;

		$muclucs=MucLuc::select('name','url','updated_at')->where('display',1)->where('book_id',$info->id)->orderBy('sort_index')->orderBy('id')->paginate(15);

		$data['total']=$muclucs->total();

		$data['muclucs']=$muclucs;

		$data['muclucmoi']=MucLuc::select('name','url','updated_at')->where('display',1)->where('book_id',$info->id)->orderBy('id','desc')->limit(5)->get();

		$data['qc']=Ads::select('title','url','image')->where('display',1)->where('position',4)->orderBy('id','desc')->first();


		$isAddViewer=false;

		if(!isset($_COOKIE['viewbook'])){
			$isAddViewer=true;

			setcookie('viewbook',$info->id,time()+1200);
		}else{
			$arrviewer=explode(',',$_COOKIE['viewbook']);

			if(!in_array($info->id, $arrviewer)){
				$arrviewer[]=$info->id;

				$isAddViewer=true;

				setcookie('viewbook',implode(',', $arrviewer),time()+1200);
			}
		}

		if($isAddViewer){
			$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
			
			$ngaydoc= $dt->day.''.$dt->month.''.$dt->year;

			if($info->ngaydoc==$ngaydoc){
				Product::where('id',$info->id)->update(array('viewer'=>$info->viewer+1,'doctn'=>$info->doctn+1));
			}else{
				Product::where('id',$info->id)->update(array('viewer'=>$info->viewer+1,'ngaydoc'=>$ngaydoc,'doctn'=>0));
			}
		}

		return view("ui.book.detail",$data);
	}

	public function reader($url,$url1){

		$info=Product::select('id','cate_id','name','url','price')->where('url',$url)->first();
		if($info==null){
			return view("errors.404");
		}

		if($info->price>0){
			$user_id=$this->isLogin();

			if($user_id==0){
				return redirect($info->url.'.html')->with('error_message','1');
			}

			$order=Order::select('active')->where('user_id',$user_id)->where('book_id',$info->id)->first();

			if($order==null){
				return redirect($info->url.'.html')->with('error_message','3');
			}else{
				if($order->active==0){
					return redirect($info->url.'.html')->with('error_message','2');
				}
			}
		}

		$data=array();

		$data['info']=$info;

		$mucluc=MucLuc::select('id','name','url','image','video','audio','content','viewer','ngaydoc','doctn')->where('url',$url1)->where('book_id',$info->id)->where('display',1)->first();

		if($mucluc==null){
			return redirect($url.'.html');
		}

		$data['mucluc']=$mucluc;

		$data['muclucs']=MucLuc::select('name','url')->where('display',1)->where('book_id',$info->id)->orderBy('sort_index')->orderBy('id')->get();

		$data['qc']=Ads::select('title','url','image')->where('display',1)->where('position',4)->orderBy('id','desc')->first();

		$isAddViewer=false;

		if(!isset($_COOKIE['viewchap'])){
			$isAddViewer=true;

			setcookie('viewchap',$mucluc->id,time()+1200);
		}else{
			$arrviewer=explode(',',$_COOKIE['viewchap']);

			if(!in_array($mucluc->id, $arrviewer)){
				$arrviewer[]=$mucluc->id;

				$isAddViewer=true;

				setcookie('viewchap',implode(',', $arrviewer),time()+1200);
			}
		}

		if($isAddViewer){
			$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
			
			$ngaydoc= $dt->day.''.$dt->month.''.$dt->year;

			if($mucluc->ngaydoc==$ngaydoc){
				MucLuc::where('id',$mucluc->id)->update(array('viewer'=>$mucluc->viewer+1,'doctn'=>$mucluc->doctn+1));
			}else{
				MucLuc::where('id',$mucluc->id)->update(array('viewer'=>$mucluc->viewer+1,'ngaydoc'=>$ngaydoc,'doctn'=>0));
			}
		}


		return view("ui.book.read",$data);
	}
}