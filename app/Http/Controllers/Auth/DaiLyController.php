<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Input;
use Illuminate\Routing\Controller;
use Session;
use Redirect;

class DaiLyController extends Controller
{
	public function getBranches()
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
            $agency = $th->getAgency();
            $support = $th->getSupport();
            $productCateIDIndex = $this;
            $convert = new \App\Http\Controllers\convertString();

            $branches = $th->getBranches();
            
        return View("fontend.branches.branches",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"branches"=>$branches,"convert"=>$convert,"tags"=>$tags,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
        }
        public function getAgencys($id,$name)
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
            $agency = $th->getAgency();
            $branches = $th->getBranches();
            $support = $th->getSupport();
            $productCateIDIndex = $this;
            $convert = new \App\Http\Controllers\convertString();

            $agencys = $th->getAgencys($id);
            $branche=null;
            if(count($agencys)>0)
                $branche = $th->getBranche($agencys[0]->branch_id);

            //return $branche;

        return View("fontend.branches.agencys",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"agencys"=>$agencys,"convert"=>$convert,"branche"=>$branche,"tags"=>$tags,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex,"branches"=>$branches));
        }
        public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }
}

?>