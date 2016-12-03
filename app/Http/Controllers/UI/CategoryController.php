<?php

namespace App\Http\Controllers\UI;
use App\Category;
use App\Product;


class CategoryController extends BaseController
{
	protected $loadNewBook=true;
	protected $loadFeBook=true;

	public function index($url)
	{
		$cate=array(
			'sach-mien-phi'=>'Sách miễn phí',
			'sach-co-phi'=>'Sách có phí',
			'sach-moi'=>'Sách mới nhất',
			'sach-xem-nhieu'=>'Sách xem nhiều',
			'sach-hoc-vien'=>'Sách học viên'
		);

		if(!array_key_exists($url, $cate)){
			return view("errors.404");
		}

		$data=array();

		$info=array();
		$info['url']=$url;
		$info['name']=$cate[$url];

		$data['info']=$info;


		$products=array();

		switch ($url) {
			case 'sach-mien-phi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('price',0)->orderBy('id','desc')->paginate(12);
				break;
			case 'sach-co-phi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('price','>',0)->orderBy('id','desc')->paginate(12);
				break;
			case 'sach-moi':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->orderBy('updated_at','desc')->paginate(12);
				break;
			case 'sach-xem-nhieu':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->orderBy('viewer','desc')->paginate(12);
				break;
			case 'sach-hoc-vien':
				$products=Product::select('name','url','image','author','price','price_pro')->where('display',1)->where('cate_id',2)->orderBy('updated_at','desc')->paginate(12);
				break;
		}
		$data['products']=$products;

		return view("ui.book.category",$data);
	}
}