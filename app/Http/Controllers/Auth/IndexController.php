<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use View;
use Illuminate\Database\Eloquent\Model;
class IndexController extends Controller
{
    public function getIndex()
    {
        $th = new ControllerDB();
        // return "lkdfs";
        $getCategorys = $th->getCategoryMenu();
        $menus = $th->getMenu();
        $slides =$th->getSlideShow();
        $website = $th->getWebsite();
        $news_cate = $th->getNews_cateWhere();
        $NewsCate = $th->getNews_cate();
        $cate_id=0;
        if(count($news_cate)>0)
        {
            $cate_id = $news_cate[0]->id;
        }
        //$convertString = new convertString();
        $news = $th->getNewsWhere($cate_id);
        $newsHot = $th->getNews_hot();
        $ads = $th->getAds();
        $productSelling = $th->getProductSelling();
        $cateApps = $th->getCateApp();
        $tags = $th->getTags();
        $branches = $th->getBranches();
        $agency = $th->getAgency();
        $support = $th->getSupport();
        $convert = new \App\Http\Controllers\convertString();

        $newproducts = $th->getNewProduct();
        $categoryMenuIndex = $th->getCategoryMenuIndex();
        $productCateIDIndex = $this;

        $adscenter=null;

        foreach($ads as $ad){
            if($ad->position==5){
                $adscenter=$ad;
                break;
            }
        }


       // return $this->getNewsWhereName("kingtech");
        //return $productSelling;
        return View("fontend.index",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news_cate"=>$news_cate,"news"=>$news,"newsHot"=>$newsHot,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"newproducts"=>$newproducts,"categoryMenuIndex"=>$categoryMenuIndex,"productCateIDIndex"=>$productCateIDIndex,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"adscenter"=>$adscenter));
    }
    public function getProdctCateID($cate_id)
    {
        $th = new ControllerDB();
        return $th->getProductIndex($cate_id);
    }
    public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }

    public function position_user(){
       if(\Cookie::has("uon")){
            $data=json_decode(\Cookie::get('uon'));
            $page=trim(\Input::get("page"));
            $url=\Input::get('url');

            if(strpos($url, '/product/')!==false){
                $page='Sản phẩm: '.$page;                
            }else{
                if(strpos($url, '/tin-tuc/')!==false){
                    $page='Xem tin tức: '.$page;                
                }else{
                    if(strpos($url, '/video/')!==false){
                        $page='Xem video: '.$page;                
                    }else{
                        if(strpos($url, '/app/')!==false){
                            $page='Ứng dụng: '.$page;                
                        }   
                    }   
                }
            }

            if($page=="")
                $page="Trang chủ";
                
            \App\UserOnline::where('id2',$data->id)->update(['position'=>$page]);
        }
    }
}

?>