<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use App\Category;
use App\Menu;
use App\News;
use App\SlideShow;
use App\NewsCate;
use App\Website;
use Illuminate\Database\Eloquent\Model;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /* return table in database*/
    public function getCategoryMenu()
    {
    	$categorys = Category::where("display",1)->orderBy("sort_menu","asc")->get();
    	return $categorys;    	
    }

    public function getMenu()
    {
    	$menus = Menu::orderby("index","asc")->get();
    	return $menus;
    }
    public function getSlideShow()
    {
    	$slides = SlideShow::orderby("index","asc")->where("display",1)->get();
    	return $slides;
    }
    public function getWebsite()
    {
    	$website = Website::get();
    	return $website;
    }
    public function getNews()
    {

    }
    public function getNewsWhere($newscate)
    {
    	$news = News::orderby("id","asc")->where("cate_id",$newscate)->take(3)->get();
    	return $news;
    }
    public function getNew_cate()
    {
    	$news_cate = NewsCate::orderby("id","asc")->where("display",1)->where("show_home",1)->get();
    	return $news_cate;
    }
    public function getNews_hot()
    {
    	$newsHot = News::orderby("id","asc")->where("hot",1)->get();
    	return $newsHot;
    }
    
}
