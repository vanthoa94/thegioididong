<?php

namespace App\Http\Controllers\Admin;
use App\Video;
use App\Http\Requests\VideoRequest;


class VideoController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('video/list')){
			return $this->ErrorPermission('Video');
		}

		$data=Video::orderBy('id','desc')->get();

		return view("backend.video.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('video/create')){
			return $this->ErrorPermission('Thêm video');
		}


		return view("backend.video.create");
	}

	public function postCreate(VideoRequest $request){

		if(!$this->checkPermission('video/create')){
			return $this->ErrorPermission('Thêm video');
		}

		$video=new Video();


		$video->name=str_replace("\"", "'", trim($request->name));

		if(trim($request->title)==""){
			$video->title=$video->name;
		}else{
			$video->title=str_replace("\"", "'", trim($request->title));

		}

		$video->url=$this->formatToUrl(trim($request->url));
		if(Video::select('id')->where('url',$video->url)->count()>0){
			return redirect()->to('admin/video/create')->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$idyoutu=trim($request->video_url);
		$arrid=array();
		$ferror=false;
		if(strpos("a".$idyoutu, "youtube.com")==false && strpos("a".$idyoutu, "youtu.be")==false){
				$ferror=true;
		}else{
			if(strpos("a".$idyoutu, "youtube.com")!=false){
				$arrid=preg_split("/watch\\?v=|\/embed\\//", $idyoutu);
						
			}else{
				$arrid=explode("youtu.be/", $idyoutu);
			}
		}

		if($ferror || count($arrid)<=1){
			return redirect()->to('admin/video/create')->with(['message'=>'Link Video Youtube không hợp lệ. Vui lòng copy url video của youtube dán vào.','message_type'=>'danger'])->withInput($request->all());
		}

		$idyoutube=preg_split("/(&|#|\\?)+/", $arrid[1]);
		
		$video->video_url="https://www.youtube.com/embed/".$idyoutube[0];
		if(trim($request->image)==""){
			$video->image="http://img.youtube.com/vi/".$idyoutube[0]."/1.jpg";
		}else{
			$video->image=$request->image;
		}
		$video->source=1;
		$video->display=1;
		$video->view=0;

		if($video->save()){
			return redirect()->to('admin/video/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/video/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('video/update')){
			return $this->ErrorPermission('Sửa video');
		}

		$data=array();
		$data['data']=Video::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/video')->with(['message'=>'Video không tồn tại.','message_type'=>'danger']);
		
		return view('backend.video.update',$data);
	}

	public function postUpdate(VideoRequest $request){

		if(!$this->checkPermission('video/update')){
			return $this->ErrorPermission('Sửa video');
		}

		$video=Video::find((int)$request->id);
		$video->name=str_replace("\"", "'", trim($request->name));

		if(trim($request->title)==""){
			$video->title=$video->name;
		}else{
			$video->title=str_replace("\"", "'", trim($request->title));

		}

		$video->url=$this->formatToUrl(trim($request->url));
		if(Video::select('id')->where('id','<>',(int)$request->id)->where('url',$video->url)->count()>0){
			return redirect()->to('admin/video/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$idyoutu=trim($request->video_url);
		$arrid=array();
		$ferror=false;
		if(strpos("a".$idyoutu, "youtube.com")==false && strpos("a".$idyoutu, "youtu.be")==false){
				$ferror=true;
		}else{
			if(strpos("a".$idyoutu, "youtube.com")!=false){
				$arrid=preg_split("/watch\\?v=|\/embed\\//", $idyoutu);
						
			}else{
				$arrid=explode("youtu.be/", $idyoutu);
			}
		}

		if($ferror || count($arrid)<=1){
			return redirect()->to('admin/video/create')->with(['message'=>'Link Video Youtube không hợp lệ. Vui lòng copy url video của youtube dán vào.','message_type'=>'danger'])->withInput($request->all());
		}

		$idyoutube=preg_split("/(&|#|\\?)+/", $arrid[1]);
		
		$video->video_url="https://www.youtube.com/embed/".$idyoutube[0];
		if(trim($request->image)==""){
			$video->image="http://img.youtube.com/vi/".$idyoutube[0]."/1.jpg";
		}else{
			$video->image=$request->image;
		}
		
		if($video->save()){
			return redirect()->to('admin/video/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/video/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('video/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Video::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công video {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa video {name} thất bại"]);
	}

	public function postDeletes(){

		if(!$this->checkPermission('video/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(Video::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." video."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa video thất bại"]);
	}

	public function display(){
		if(!$this->checkPermission('video/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$display=\Input::get('ischeck');

		$display=($display=='true')?1:0;

		if(Video::where('id',$id)->update(['display'=>$display])){
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}
}

?>