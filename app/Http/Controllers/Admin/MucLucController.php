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

		$sach=Product::select('id','name')->where('id',$id)->first();
		if($sach==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);


		
		$data=MucLuc::select('id','sort_index','name','url','display','created_at','updated_at','viewer')->where('muclucs.book_id',$id)->orderBy('sort_index')->get();
		
		
		return view("backend.mucluc.index",array('data'=>$data,'sach'=>$sach));
	}


	public function create($id){
		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm mục lục');
		}

		$sach=Product::select('id','name')->where('id',$id)->first();
		if($sach==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);

		return view("backend.mucluc.create",array('sach'=>$sach));
	}

	public function postCreate(MucLucRequest $request){

		if(!$this->checkPermission('product/create')){
			return $this->ErrorPermission('Thêm sách');
		}

		$mucluc=new MucLuc();

		$mucluc->name=str_replace("\"", "'", trim($request->name));

		$mucluc->url=$this->formatToUrl(trim($request->url));
		if(MucLuc::select('id')->where('book_id',$request->idsach)->where('url',$mucluc->url)->count()>0){
			return redirect()->to('admin/muc-luc/create/'.$request->idsach)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$mucluc->book_id=$request->idsach;

		$mucluc->sort_index=0;

		$mucluc->viewer=0;

		$mucluc->image=trim($request->image);

		$mucluc->audio=trim($request->audio);

		$mucluc->content=$request->content;

		$mucluc->display=1;


		$idyoutu=trim($request->video);
		if($idyoutu!=""){
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
				return redirect()->to('admin/muc-luc/create/'.$request->idsach)->with(['message'=>'Link Video Youtube không hợp lệ. Vui lòng copy url video của youtube dán vào.','message_type'=>'danger'])->withInput($request->all());
			}

			$idyoutube=preg_split("/(&|#|\\?)+/", $arrid[1]);
			
			$mucluc->video=$idyoutube[0];

		}else{
			$mucluc->video="";
		}
		
		if($mucluc->save()){
			
			return redirect()->to('admin/muc-luc/create/'.$request->idsach)->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/muc-luc/create/'.$request->idsach)->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$data=array();
		$data['data']=MucLuc::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);

		$data['sach']=Product::select('id','name')->where('id',$data['data']->book_id)->first();
		if($data['sach']==null)
			return redirect()->to('admin/product')->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
	
		return view('backend.mucluc.update',$data);
	}

	public function postUpdate(MucLucRequest $request){

		if(!$this->checkPermission('product/update')){
			return $this->ErrorPermission('Sửa sách');
		}

		$mucluc=MucLuc::find((int)$request->id);
		if($mucluc==null)
			return redirect()->to('admin/muc-luc/'.$request->idsach)->with(['message'=>'Sách không tồn tại.','message_type'=>'danger']);
		
		$mucluc->name=str_replace("\"", "'", trim($request->name));

		$mucluc->url=$this->formatToUrl(trim($request->url));
		if(MucLuc::select('id')->where('book_id',$request->idsach)->where('id','<>',$request->id)->where('url',$mucluc->url)->count()>0){
			return redirect()->to('admin/muc-luc/update/'.$request->id)->with(['message'=>'Url đã tồn tại.','message_type'=>'danger'])->withInput($request->all());
		}

		$mucluc->image=trim($request->image);

		$mucluc->audio=trim($request->audio);

		$mucluc->content=$request->content;

		$idyoutu=trim($request->video);
		if($idyoutu!=""){
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
				return redirect()->to('admin/muc-luc/update/'.$request->id)->with(['message'=>'Link Video Youtube không hợp lệ. Vui lòng copy url video của youtube dán vào.','message_type'=>'danger'])->withInput($request->all());
			}

			$idyoutube=preg_split("/(&|#|\\?)+/", $arrid[1]);
			
			$mucluc->video=$idyoutube[0];

		}else{
			$mucluc->video="";
		}
		
		
		if($mucluc->save()){
		
			return redirect()->to('admin/muc-luc/update/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/muc-luc/update/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
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

	public function postDeletes(){

		if(!$this->checkPermission('product/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=explode(',',\Input::get('data'));

		if(MucLuc::destroy($id)){
			return json_encode(["success"=>true,"message"=>"Xóa thành công ".count($id)." Mục lục."]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa mục lục thất bại"]);
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
		
			MucLuc::where('id',$value)->update(['sort_index'=>$data[$key]]);
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