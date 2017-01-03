<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\Category;
use App\Http\Requests\ProductRequest;
use Cache;

class ProductController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('product/list')){
			return $this->ErrorPermission('Sách');
		}

		$data=null;
		$listCategory=null;


		if(Cache::has('c_a_product')){
			$data=Cache::get('c_a_product');
		}else{

			$data=Product::select('id','cate_id','name','url','image','price','price_pro','status','quantity','viewer','author','display','show_home','index_home','created_at','updated_at','doctn')->orderBy('id','desc')->get();
			Cache::add('c_a_product',$data,5);
		}

		if(Cache::has('c_a_category')){
			$listCategory=Cache::get('c_a_category');
		}else{
			$listCategory=Category::orderBy('id','desc')->get();

			Cache::forever('c_a_category',$listCategory);
		}

		
		return view("backend.product.index",array('data'=>$data,'listCategory'=>$listCategory));
	}


	public function create(){
		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm sách');
		}

		$data=Category::select('id','name','parent')->get();

		return view("backend.product.create",array('data'=>$data));
	}

	public function postCreate(ProductRequest $request){

		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm sách');
		}

		$product=new Product();

		$product->name=str_replace("\"", "'", trim($request->name));

		$product->url=$this->formatToUrl(trim($request->url));
		if(Product::select('id')->where('url',$product->url)->count()>0){
			return redirect()->to('admin/product/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$product->cate_id=$request->cate_id;

		$product->image=trim($request->image);

		$product->description=str_replace("\"", "'", trim($request->description));
		$product->description=str_replace("\n", "<br>",$product->description);
		$product->keywords=str_replace("\"", "'", trim($request->keywords));
		
		$product->price=preg_replace("/(\.|-| |\,)*/", "", trim($request->price));

		if(trim($request->price_company)!=""){
			$product->price_pro=preg_replace("/(\.|-| |\,)*/", "", trim($request->price_company));
		}else{
			$product->price_pro=0;
		}
		$product->status=$request->status;

		if(trim($request->quantity)!=""){
			$product->quantity=$request->quantity;
		}else{
			$product->quantity=0;
		}
		$product->viewer=0;
		$product->sold=0;
		$product->display=1;
		$product->index_home=0;
		$product->daxem=0;

		$product->promotion=$request->promotion;

		$product->author=trim($request->author);

		$product->show_home=1;

		$dt=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		

		$product->ngaydoc= $dt->day.''.$dt->month.''.$dt->year;

		$product->doctn=0;
		

		if($product->save()){
			if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
			return redirect()->to('admin/product/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/product/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$data=array();
		$data['data']=Product::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
		$data['listCategory']=Category::select('id','name','parent')->get();
		return view('backend.product.update',$data);
	}

	public function postUpdate(ProductRequest $request){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$product=Product::find((int)$request->id);
		if($product==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
		
		$product->name=str_replace("\"", "'", trim($request->name));

		$product->url=$this->formatToUrl(trim($request->url));
		if(Product::select('id')->where('id','<>',(int)$request->id)->where('url',$product->url)->count()>0){
			return redirect()->to('admin/product/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$product->cate_id=$request->cate_id;

		$product->image=trim($request->image);

		$product->description=str_replace("\"", "'", trim($request->description));
		$product->description=str_replace("\n", "<br>",$product->description);
		$product->keywords=str_replace("\"", "'", trim($request->keywords));
		
		$product->price=preg_replace("/(\.|-| |\,)*/", "", trim($request->price));

		if(trim($request->price_company)!=""){
			$product->price_pro=preg_replace("/(\.|-| |\,)*/", "", trim($request->price_company));
		}else{
			$product->price_pro=0;
		}
		$product->status=$request->status;

		if(trim($request->quantity)!=""){
			$product->quantity=$request->quantity;
		}else{
			$product->quantity=0;
		}

		
		$product->promotion=$request->promotion;

		$product->author=trim($request->author);

		
		if($product->save()){
			if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
			return redirect()->to('admin/product/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/product/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('product/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Product::destroy($id)){
			if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
			return json_encode(["success"=>true,"message"=>"Xóa thành công sách {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa sách {name} thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Product::where('id',$id)->update(['display'=>$display])){
			if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function show_home(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$show_home=\Input::get('ischeck');

		$show_home=($show_home=='true')?1:0;

		if(Product::where('id',$id)->update(['show_home'=>$show_home])){
			if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			
			Product::where('id',$value)->update(['index_home'=>$data[$key]]);
		}
		if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
		return json_encode(["success"=>true]);
	}

	public function displays(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		Product::whereIn('id',$data)->update(['display'=>1]);

		if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function hides(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		Product::whereIn('id',$data)->update(['display'=>0]);

		if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function showhomes(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		
		Product::whereIn('id',$data)->update(['show_home'=>1]);

		if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function hidehomes(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		
		Product::whereIn('id',$data)->update(['show_home'=>0]);

		if(Cache::has('c_a_product'))
				Cache::forget('c_a_product');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}
}

?>