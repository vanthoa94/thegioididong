<?php

namespace App\Http\Controllers\Admin;
use App\AppCate;
use App\Http\Requests\AppCateRequest;


class AppCateController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('appcate/list')){
			return $this->ErrorPermission('Loại ứng dụng');
		}

		$data=AppCate::orderBy('id','desc')->get();
		
		return view("backend.appcate.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('appcate/create')){
			return $this->ErrorPermission('Thêm loại ứng dụng');
		}

		$data=AppCate::select('id','parent','name')->get();

		return view("backend.appcate.create",array('data'=>$data));
	}

	public function postCreate(AppCateRequest $request){

		if(!$this->checkPermission('appcate/create')){
			return $this->ErrorPermission('Thêm loại ứng dụng');
		}

		$appcate=new AppCate();

		$appcate->parent=$request->parent;
		$appcate->url=$this->formatToUrl(trim($request->url));
		if(AppCate::select('id')->where('url',$appcate->url)->count()>0){
			return redirect()->to('admin/app-category/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		
		$appcate->name=trim($request->name);
		$appcate->index=0;
		$appcate->display=($request->display=='on')?1:0;

		if($appcate->save()){
			return redirect()->to('admin/app-category/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/app-category/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('appcate/update')){
			return $this->ErrorPermission('Sửa loại ứng dụng');
		}

		$data=array();
		$data['data']=AppCate::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/app-category')->with(['message'=>'Loại ứng dụng không tồn tại.','message_type'=>'danger']);
		if($data['data']->parent!=0){
			$data['listMenu']=AppCate::select('id','name','parent')->where('id','<>',$id)->where('parent','<>',$id)->get();
		}
		return view('backend.appcate.update',$data);
	}

	public function postUpdate(AppCateRequest $request){

		if(!$this->checkPermission('appcate/update')){
			return $this->ErrorPermission('Sửa loại ứng dụng');
		}

		$appcate=AppCate::find((int)$request->id);
		if($appcate==null)
			return redirect()->to('admin/app-category')->with(['message'=>'Loại ứng dụng không tồn tại.','message_type'=>'danger']);
		
		$appcate->parent=$request->parent;
		$appcate->url=$this->formatToUrl(trim($request->url));
		if(AppCate::select('id')->where('id','<>',(int)$request->id)->where('url',$appcate->url)->count()>0){
			return redirect()->to('admin/app-category/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		
		$appcate->name=trim($request->name);
		$appcate->display=($request->display=='on')?1:0;
		
		if($appcate->save()){
			return redirect()->to('admin/app-category/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/app-category/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('appcate/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(AppCate::where('parent',$id)->count('id')>0){
			return json_encode(["success"=>false,"message"=>"Loại ứng dụng {name} đã có loại con. Không thể xóa."]);
		}

		if(\App\App::where('cate_id',$id)->count('id')>0){
			return json_encode(["success"=>false,"message"=>"Loại ứng dụng {name} đã có ứng dụng. Không thể xóa."]);
		}

		if(AppCate::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công loại ứng dụng {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa loại ứng dụng {name} thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('appcate/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(AppCate::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('appcate/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			AppCate::where('id',$value)->update(['index'=>$data[$key]]);
		}

		return json_encode(["success"=>true]);
	}
}

?>