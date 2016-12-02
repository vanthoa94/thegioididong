<?php

namespace App\Http\Controllers\UI;
use App\Product;
use App\MucLuc;


class BookController extends BaseController
{
	protected $loadNewBook=true;

	public function index($url)
	{
		$info=Product::select('id','cate_id','name','url','image','price','price_pro','description','keywords','status','viewer','promotion','author')->where('url',$url)->first();
		if($info==null){
			return view("ui.404");
		}
		$data=array();

		$data['info']=$info;

		$cothemuondoc=Product::select('name','url','image','price','price_pro','author','viewer')->where('display',1)->where('cate_id',$info->cate_id)->where('id','<>',$info->id)->orderBy('viewer','desc')->limit(5)->get();
           

		$data['cothemuondoc']=$cothemuondoc;

		$muclucs=MucLuc::select('name','url','updated_at')->where('display',1)->where('book_id',$info->id)->orderBy('sort_index')->paginate(15);

		$data['total']=$muclucs->total();

		$data['muclucs']=$muclucs;

		$data['muclucmoi']=MucLuc::select('name','url','updated_at')->where('display',1)->where('book_id',$info->id)->orderBy('id','desc')->limit(5)->get();

		return view("ui.book.detail",$data);
	}
}