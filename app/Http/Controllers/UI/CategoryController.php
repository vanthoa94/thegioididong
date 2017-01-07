<?php

namespace App\Http\Controllers\UI;
use App\Category;
use App\Product;


class CategoryController extends BaseController
{
	protected $loadNewBook=true;
	protected $loadFeBook=true;
	protected $loadVideo=false;

	public function index($url)
	{
		$cate=array(
			'sach-mien-phi'=>'Sách miễn phí',
			'sach-co-phi'=>'Sách có phí',
			'sach-moi'=>'Sách mới nhất',
			'sach-xem-nhieu'=>'Sách xem nhiều'
		);


		$info=array();
		


		if(!array_key_exists($url, $cate)){

			$infoc=Category::select('id','name','url')->where('url',$url)->where('display',1)->first();

			if($infoc==null)
				return view("errors.404");
			$info['url']=$infoc->url;
			$info['name']=$infoc->name;
			$info['id']=$infoc->id;
		}else{
			$info['url']=$url;
			$info['name']=$cate[$url];
		}

		$data=array();

		$data['info']=$info;


		$products=array();

		switch ($url) {
			case 'sach-mien-phi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('price',-1)->orderBy('id','desc')->paginate(24);
				break;
			case 'sach-co-phi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('price','>',-1)->orderBy('id','desc')->paginate(24);
				break;
			case 'sach-moi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->orderBy('updated_at','desc')->paginate(24);
				break;
			case 'sach-xem-nhieu':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->orderBy('viewer','desc')->paginate(24);
				break;
			default:
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('cate_id',$info['id'])->orderBy('updated_at','desc')->paginate(24);
				break;
		}
		$data['products']=$products;

		$data['total']=$products->total();

		if(!isset($data['info']['id'])){
			$data['info']['id']=array_search($url,array_keys($cate));
			
			$data['info']['id']++;
			$data['info']['id']=$data['info']['id']*100000;
		}

		return view("ui.book.category",$data);
	}

	public function tacgia($url)
	{
		$data=array();

		$info=array();
		$info['url']=$url;
		$info['name']="Tác giả ".$url;
		$info['id']=4465555;
		$data['info']=$info;


		$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('author',$url)->orderBy('updated_at','desc')->paginate(24);

		$data['products']=$products;

		$data['total']=$products->total();

		return view("ui.book.category",$data);
	}

	public function mybook()
	{
		$user_id=$this->isLogin();
		if($user_id==0){
			return redirect('/');
		}
		$data=array();

		$products=Product::select('name','url','image','author','mua_sach.gia_mua','mua_sach.created_at')->join('mua_sach','books.id','=','mua_sach.book_id')->where('mua_sach.user_id',$user_id)->orderBy('mua_sach.id','desc')->paginate(24);

		$data['products']=$products;

		$data['total']=$products->total();

		return view("ui.book.mybook",$data);
	}
}