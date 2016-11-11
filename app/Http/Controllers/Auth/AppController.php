<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Input;
use Illuminate\Routing\Controller;

class AppController extends Controller
{
	

	public function getApp($id,$name)
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

        $apps = $th->getApp($id);

        return View("fontend.app.cateapp",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"apps"=>$apps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
	}
	public function getDetailApp($id,$name)
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

        $detailapp = $th->getDetailApp($id);

        return View("fontend.app.detailapp",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"detailapp"=>$detailapp,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
	}
        public function getNewsWhereName($name)
            {
                $th = new ControllerDB();
                return $th->getNewsWhereName($name);
            }	
}

?>