<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class ErrorController extends Controller
{
	public function account()
	{
		
		return view("backend.error.account");
	}	

	public function permission()
	{
		
		return view("backend.error.permission");
	}	

}

?>