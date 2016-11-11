<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Input;
use Illuminate\Routing\Controller;

class NewsCateController extends Controller
{
	public function getNewsOfCate($id,$name)
	{
		$th = new ControllerDB();

		$news = $th->getNewsWhereCateID($id,$name);
		$NewsCate = $th->getNews_cate();
		
        $getCategorys = $th->getCategoryMenu();
        $menus = $th->getMenu();
        $slides =$th->getSlideShow();
        $website = $th->getWebsite();
        $ads = $th->getAds();
        $productSelling = $th->getProductSelling();
        $cateApps = $th->getCateApp();
        $tags = $th->getTags();
        $branches = $th->getBranches();
        $agency = $th->getAgency();
        $support = $th->getSupport();
        $productCateIDIndex = $this;
        $convert = new \App\Http\Controllers\convertString();

        return View("fontend.news.newscate",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
	}

	public function getNews()
	{
		$th = new ControllerDB();

		$news = $th->getNews();
		$NewsCate = $th->getNews_cate();
        $getCategorys = $th->getCategoryMenu();
        $menus = $th->getMenu();
        $slides =$th->getSlideShow();
        $website = $th->getWebsite();
        $ads = $th->getAds();
        $productSelling = $th->getProductSelling();
        $cateApps = $th->getCateApp();
        $tags = $th->getTags();
        $branches = $th->getBranches();
        $agency = $th->getAgency();
        $support = $th->getSupport();
        $productCateIDIndex = $this;
        $convert = new \App\Http\Controllers\convertString();

        return View("fontend.news.newscate",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
	}
	public function getDetailNews($catename,$id,$name)
	{
		$th = new ControllerDB();

		$detailnews = $th->getNewsWhereID($id);
		$newsRefer = 0;
		if(count($detailnews)>0) 
			{
				$newsRefer = $th->getNewsReferWhereCateID($detailnews[0]->cate_id,$detailnews[0]->id);
			}

		$NewsCate = $th->getNews_cate();
		
        $getCategorys = $th->getCategoryMenu();
        $menus = $th->getMenu();
        $slides =$th->getSlideShow();
        $website = $th->getWebsite();
        $ads = $th->getAds();
        $productSelling = $th->getProductSelling();
        $cateApps = $th->getCateApp();
        $tags = $th->getTags();
        $branches = $th->getBranches();
        $agency = $th->getAgency();
        $support = $th->getSupport();
        $productCateIDIndex = $this;
        $convert = new \App\Http\Controllers\convertString();

        return View("fontend.news.news",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"detailnews"=>$detailnews,"NewsCate"=>$NewsCate,"newsRefer"=>$newsRefer,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
	}
        public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }
}

?>