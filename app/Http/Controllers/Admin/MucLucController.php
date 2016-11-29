<?php

namespace App\Http\Controllers\Admin;
use App\MucLuc;
use App\Product;
use App\Http\Requests\MucLucRequest;

class MucLucController extends BaseController
{
	public function index($id)
	{
		if(!$this->checkPermission('product/list')){
			return $this->ErrorPermission('Mục lục');
		}

		$sach=Product::select('name')->where('id',$id)->first();
if($sach==null)
		return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);


		
		$data=MucLuc::select('muclucs.id','muclucs.sort_index','muclucs.name','muclucs.url','muclucs.display','muclucs.created_at','muclucs.updated_at')->where('muclucs.book_id',$id)->orderBy('id','desc')->get();
		
		
		return view("backend.mucluc.index",array('data'=>$data,'sach'=>$sach->name));
	}


	public function create($id){
		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm mục lục');
		}


		return view("backend.product.create",array('data'=>$data));
	}

	public function postCreate(MucLucRequest $request){

		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm sách');
		}

		$mucluc=new MucLuc();

		

		if($mucluc->save()){
			
			return redirect()->to('admin/muc-luc/create/1')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/muc-luc/create/1')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$data=array();
		$data['data']=MucLuc::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
		$data['listCategory']=Category::select('id','name','parent')->get();
		return view('backend.product.update',$data);
	}

	public function postUpdate(MucLucRequest $request){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$mucluc=MucLuc::find((int)$request->id);
		if($mucluc==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
		
		
		if($mucluc->save()){
		
			return redirect()->to('admin/muc-luc/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/muc-luc/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('product/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(MucLuc::destroy($id)){
		
			return json_encode(["success"=>true,"message"=>"Xóa thành công mục lục {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa mục lục {name} thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(MucLuc::where('id',$id)->update(['display'=>$display])){
			
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
		
			MucLuc::where('id',$value)->update(['index_home'=>$data[$key]]);
		}

		return json_encode(["success"=>true]);
	}

	public function displays(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			MucLuc::where('id',(int)$item)->update(['display'=>1]);
		}

		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function hides(){
		if(!$this->checkPermission('product/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			MucLuc::where('id',(int)$item)->update(['display'=>0]);
		}

		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

}

?>