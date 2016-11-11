<?php

namespace App\Http\Controllers\Admin;
use App\NewsCate;
use App\Http\Requests\NewsCateRequest;


class NewsCateController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('newscate/list')){
			return $this->ErrorPermission('Loại tin tức');
		}

		$data=NewsCate::orderBy('id','desc')->get();
		
		return view("backend.newscate.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('newscate/create')){
			return $this->ErrorPermission('Thêm loại tin tức');
		}
		return view("backend.newscate.create");
	}

	public function postCreate(NewsCateRequest $request){

		if(!$this->checkPermission('newscate/create')){
			return $this->ErrorPermission('Thêm loại tin tức');
		}

		$newscate=new NewsCate();

		$newscate->url=$this->formatToUrl(trim($request->url));
		if(NewsCate::select('id')->where('url',$newscate->url)->count()>0){
			return redirect()->to('admin/news-category/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		
		$newscate->name=trim($request->name);
		$newscate->display=1;
		$newscate->show_home=1;

		if($newscate->save()){
			return redirect()->to('admin/news-category/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/news-category/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('newscate/update')){
			return $this->ErrorPermission('Sửa loại tin tức');
		}

		$data=array();
		$data['data']=NewsCate::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/news-category')->with(['message'=>'Loại tin tức không tồn tại.','message_type'=>'danger']);
		
		return view('backend.newscate.update',$data);
	}

	public function postUpdate(NewsCateRequest $request){

		if(!$this->checkPermission('newscate/update')){
			return $this->ErrorPermission('Sửa loại tin tức');
		}

		$newscate=NewsCate::find((int)$request->id);
		if($newscate==null)
			return redirect()->to('admin/news-category')->with(['message'=>'Loại tin tức không tồn tại.','message_type'=>'danger']);
		
		$newscate->url=$this->formatToUrl(trim($request->url));
		if(NewsCate::select('id')->where('id','<>',(int)$request->id)->where('url',$newscate->url)->count()>0){
			return redirect()->to('admin/news-category/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		
		$newscate->name=trim($request->name);
		
		if($newscate->save()){
			return redirect()->to('admin/news-category/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/news-category/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('newscate/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(\App\News::where('cate_id',$id)->count('id')>0){
				return json_encode(["success"=>false,"message"=>"Đã có tin tức thuộc loại tin {name}. Không thể xóa."]);
			}

		if(NewsCate::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công loại tin tức {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa loại tin tức {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('newscate/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		$arr_del=array();

		foreach($id as $i){
			if(\App\News::where('cate_id',$i)->count('id')==0){
				$arr_del[]=$i;
			}
		}

		if(NewsCate::destroy($arr_del)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($arr_del)." loại tin tức.","idSuccess"=>$arr_del]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa loại tin tức thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('newscate/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(NewsCate::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function show_home(){
		if(!$this->checkPermission('newscate/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$show_home=\Input::get('ischeck');

		$show_home=($show_home=='true')?1:0;

		if(NewsCate::where('id',$id)->update(['show_home'=>$show_home])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('newscate/update')){
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