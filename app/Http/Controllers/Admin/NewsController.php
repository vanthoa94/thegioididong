<?php

namespace App\Http\Controllers\Admin;
use App\News;
use App\NewsCate;
use App\Http\Requests\NewsRequest;
use Cache;

class NewsController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('news/list')){
			return $this->ErrorPermission('Tin tức');
		}

		$data=null;

		if(Cache::has('c_a_news')){
			$data=Cache::get('c_a_news');
		}else{

			$data=News::select('id','cate_id','title','url','image','hot','description','keywords','display','created_at','updated_at','viewer')->orderBy('id','desc')->get();
			Cache::add('c_a_news',$data,5);
		}

		$listNewsCate=NewsCate::select('id','name')->get();
		
		return view("backend.news.index",array('data'=>$data,'listNewsCate'=>$listNewsCate));
	}


	public function create(){
		if(!$this->checkPermission('news/create')){
			return $this->ErrorPermission('Thêm tin tức');
		}

		$data=NewsCate::select('id','name')->get();

		return view("backend.news.create",array('data'=>$data));
	}

	public function postCreate(NewsRequest $request){

		if(!$this->checkPermission('news/create')){
			return $this->ErrorPermission('Thêm tin tức');
		}

		$news=new News();


		$news->title=str_replace("\"", "'", trim($request->title));

		$news->url=$this->formatToUrl(trim($request->url));
		if(News::select('id')->where('url',$news->url)->count()>0){
			return redirect()->to('admin/news/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$news->cate_id=(int)$request->cate_id;
		$news->image=$request->image;
		$news->hot=0;
		$news->description=str_replace("\"", "'", trim($request->description));
		$news->keywords=str_replace("\"", "'", trim($request->keywords));
		$news->content=$request->content;
		$news->display=1;
		$news->viewer=0;

		if($news->save()){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return redirect()->to('admin/news/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/news/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('news/update')){
			return $this->ErrorPermission('Sửa tin tức');
		}

		$data=array();
		$data['data']=News::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/news')->with(['message'=>'Tin tức không tồn tại.','message_type'=>'danger']);
		$data['listNewsCate']=NewsCate::select('id','name')->get();
		return view('backend.news.update',$data);
	}

	public function postUpdate(NewsRequest $request){

		if(!$this->checkPermission('news/update')){
			return $this->ErrorPermission('Sửa tin tức');
		}

		$news=News::find((int)$request->id);
		if($news==null)
			return redirect()->to('admin/news')->with(['message'=>'Tin tức không tồn tại.','message_type'=>'danger']);
		
		$news->title=str_replace("\"", "'", trim($request->title));

		$news->url=$this->formatToUrl(trim($request->url));
		if(News::select('id')->where('id','<>',(int)$request->id)->where('url',$news->url)->count()>0){
			return redirect()->to('admin/news/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$news->cate_id=(int)$request->cate_id;
		$news->image=$request->image;
		$news->description=str_replace("\"", "'", trim($request->description));
		$news->keywords=str_replace("\"", "'", trim($request->keywords));
		$news->content=$request->content;
		
		if($news->save()){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return redirect()->to('admin/news/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/news/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('news/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(News::destroy($id)){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return json_encode(["success"=>true,"message"=>"Xóa thành công tin tức {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa tin tức {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('news/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(News::destroy($id)){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." tin tức."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa tin tức thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('news/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(News::where('id',$id)->update(['display'=>$display])){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function hot(){
		if(!$this->checkPermission('news/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$hot=\Input::get('ischeck');

		$hot=($hot=='true')?1:0;

		if(News::where('id',$id)->update(['hot'=>$hot])){
			if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function hots(){
		if(!$this->checkPermission('news/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			News::where('id',(int)$item)->update(['hot'=>1]);
		}

		if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}

	public function displays(){
		if(!$this->checkPermission('news/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=explode(',',\Input::get('data'));
		foreach($data as $item){
			News::where('id',(int)$item)->update(['display'=>0]);
		}

		if(Cache::has('c_a_news'))
				Cache::forget('c_a_news');
		return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
	}
}

?>