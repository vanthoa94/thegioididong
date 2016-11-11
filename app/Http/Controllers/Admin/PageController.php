<?php

namespace App\Http\Controllers\Admin;
use App\Page;
use App\Http\Requests\PageRequest;


class PageController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('page/list')){
			return $this->ErrorPermission('Trang');
		}

		$data=Page::select('id','title','url','meta_description','meta_keywords','display','created_at','updated_at','viewer')->orderBy('id','desc')->get();

		
		return view("backend.page.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('page/create')){
			return $this->ErrorPermission('Thêm trang');
		}

		return view("backend.page.create");
	}

	public function postCreate(PageRequest $request){

		if(!$this->checkPermission('page/create')){
			return $this->ErrorPermission('Thêm trang');
		}

		$page=new Page();


		$page->title=str_replace("\"", "'", trim($request->title));

		$page->url=$this->formatToUrl(trim($request->url));
		if(Page::select('id')->where('url',$page->url)->count()>0){
			return redirect()->to('admin/page/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$page->meta_description=str_replace("\"", "'", trim($request->meta_description));
		$page->meta_keywords=str_replace("\"", "'", trim($request->meta_keywords));
		$page->content=$request->content;
		$page->display=1;
		$page->viewer=0;

		if($page->save()){
			return redirect()->to('admin/page/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/page/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('page/update')){
			return $this->ErrorPermission('Sửa trang');
		}

		$data=array();
		$data['data']=Page::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/page')->with(['message'=>'Trang không tồn tại.','message_type'=>'danger']);
		
		return view('backend.page.update',$data);
	}

	public function postUpdate(PageRequest $request){

		if(!$this->checkPermission('page/update')){
			return $this->ErrorPermission('Sửa trang');
		}

		$page=Page::find((int)$request->id);
		if($page==null)
			return redirect()->to('admin/page')->with(['message'=>'Trang không tồn tại.','message_type'=>'danger']);
		
		$page->title=str_replace("\"", "'", trim($request->title));

		$page->url=$this->formatToUrl(trim($request->url));
		if(Page::select('id')->where('id','<>',(int)$request->id)->where('url',$page->url)->count()>0){
			return redirect()->to('admin/page/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$page->meta_description=str_replace("\"", "'", trim($request->meta_description));
		$page->meta_keywords=str_replace("\"", "'", trim($request->meta_keywords));
		$page->content=$request->content;

		if($page->save()){
			return redirect()->to('admin/page/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/page/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('page/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Page::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công loại trang {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa loại trang {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('page/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Page::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." trang."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa trang thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('page/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Page::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

}

?>