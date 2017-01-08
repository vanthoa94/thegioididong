<?php

namespace App\Http\Controllers\Admin;
use App\Menu;
use App\Http\Requests\MenuRequest;
use Cache;


class MenuController extends BaseController
{
	public function index()
	{
		if(!$this->checkPermission('menu/list')){
			return $this->ErrorPermission('Menu');
		}

		if(Cache::has('c_a_menu')){
			$data=Cache::get('c_a_menu');
		}else{
			$data=Menu::orderBy('id','desc')->orderBy('index')->get();
			Cache::forever('c_a_menu',$data);
		}
		
		return view("backend.menu.index",array('data'=>$data));
	}


	public function create(){
		if(!$this->checkPermission('menu/create')){
			return $this->ErrorPermission('Thêm menu');
		}

		$data=Menu::select('id','parent_id','name')->get();

		return view("backend.menu.create",array('data'=>$data));
	}

	public function postCreate(MenuRequest $request){

		if(!$this->checkPermission('menu/create')){
			return $this->ErrorPermission('Thêm menu');
		}

		$menu=new Menu();

		$menu->parent_id=$request->parent_id;
		$menu->url=trim($request->url);
		
		
		$menu->name=trim($request->name);
		$menu->index=0;
		$menu->show_menu_top=($request->show_menu_top=='on')?1:0;
		$menu->show_footer=1;

		if($menu->save()){
			if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
			return redirect()->to('admin/menu/create')->with('message','Thêm thành công.');
		}
		return redirect()->to('admin/menu/create')->with(['message'=>'Có lỗi. Thêm thất bại','message_type'=>'danger']);
	}

	public function update($id){

		if(!$this->checkPermission('menu/update')){
			return $this->ErrorPermission('Sửa menu');
		}

		$data=array();
		$data['data']=Menu::find((int)$id);
		if($data['data']==null)
			return redirect()->to('admin/menu')->with(['message'=>'Menu không tồn tại.','message_type'=>'danger']);
		$data['listMenu']=Menu::select('id','name','parent_id')->where('id','<>',$id)->where('parent_id','<>',$id)->get();
		return view('backend.menu.update',$data);
	}

	public function postUpdate(MenuRequest $request){

		if(!$this->checkPermission('menu/update')){
			return $this->ErrorPermission('Sửa menu');
		}

		$menu=Menu::find((int)$request->id);
		if($menu==null)
			return redirect()->to('admin/menu')->with(['message'=>'Menu không tồn tại.','message_type'=>'danger']);
		
		$menu->parent_id=$request->parent_id;
		$menu->url=trim($request->url);
		

		
		$menu->name=trim($request->name);
		$menu->show_menu_top=($request->show_menu_top=='on')?1:0;
		
		if($menu->save()){
			if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
			return redirect()->to('admin/menu/'.$request->id)->with('message','Cập nhật thành công.');
		}
		return redirect()->to('admin/menu/'.$request->id)->with(['message'=>'Có lỗi. Cập nhật thất bại','message_type'=>'danger']);
	}

	public function postDelete(){

		if(!$this->checkPermission('menu/delete')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền xóa"]);
		}

		$id=(int)\Input::get('data');

		if(Menu::select('id')->where('parent_id',$id)->count()>0){
			return json_encode(["success"=>false,"message"=>"Menu này đã có menu con. Không thể xóa."]);
		}

		if(Menu::destroy($id)){
			if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
			return json_encode(["success"=>true,"message"=>"Xóa thành công menu {name}"]);
		}
		return json_encode(["success"=>false,"message"=>"Xóa menu {name} thất bại"]);
	}

	public function show_menu_top(){
		if(!$this->checkPermission('menu/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$show_menu_top=\Input::get('ischeck');

		$show_menu_top=($show_menu_top=='true')?1:0;

		if(Menu::where('id',$id)->update(['show_menu_top'=>$show_menu_top])){
			if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function show_footer(){
		if(!$this->checkPermission('menu/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$id=(int)\Input::get('data');
		$show_footer=\Input::get('ischeck');

		$show_footer=($show_footer=='true')?1:0;

		if(Menu::where('id',$id)->update(['show_footer'=>$show_footer])){
			if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
			return json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		}

		return json_encode(["success"=>false,"message"=>"Thất bại"]);
	}

	public function sort(){
		if(!$this->checkPermission('menu/update')){
			return json_encode(["success"=>false,"message"=>"Bạn không có quyền chỉnh sửa"]);
		}
		$data=\Input::get('data');
		foreach(\Input::get('id') as $key=>$value){
			Menu::where('id',$value)->update(['index'=>$data[$key]]);
		}
		if(Cache::has('c_a_menu'))
				Cache::forget('c_a_menu');
		return json_encode(["success"=>true]);
	}
}

?>