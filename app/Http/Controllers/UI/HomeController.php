<?php

namespace App\Http\Controllers\UI;



class HomeController extends BaseController
{
	public function index()
	{
		return view("ui.home");
	}
}