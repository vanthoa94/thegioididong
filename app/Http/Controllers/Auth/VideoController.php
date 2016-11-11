<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Input;
use Illuminate\Routing\Controller;
use Session;
use Redirect;

class VideoController extends Controller
{
	public function getVideo()
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

            $videos = $th->getVideos();

        return View("fontend.video.video",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"videos"=>$videos,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
        }

        public function getDetailVideo($id,$name)
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

            $video = $th->getVideo($id,$name);
            $videosRefer=null;
            if(count($video)>0)
                $videosRefer = $th->getVideosRefer($video[0]->id);


        return View("fontend.video.detail",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"video"=>$video,"videosRefer"=>$videosRefer,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
        }
        public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }
}

?>