<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Input;
use Illuminate\Routing\Controller;
use Session;
use Redirect;

class DangNhapController extends Controller
{
	

        public function getView()
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

        return View("fontend.signin.signin",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
        }
	public function getUser()
	{
	        $txtName = Input::get('txtName');
                $txtPass = Input::get('txtPass');
                $hasuser = $this->checkLogin($txtName,$txtPass);
                if($hasuser)
                {
                        Session::put("isuser","true");
                        return Redirect::to("/");
                }
                else
                {
                        Session::put("loginError","true");
                        return Redirect::to("dang-nhap.html");
                }

	}
        public function checkLogin($name,$pass)
        {
                $th = new ControllerDB();
                $user = $th->getUser(trim($name),trim($pass));
                if(count($user)>0)
                {
                    Session::put("userInfo",$user);
                        return true;
                }
                else
                        return false;
        }	
        public function checkPriceCompany()
        {
                
            if(Session::has("isuser"))
            {
                return Redirect::to("/");
            }
            else
            {
                return Redirect::to("dang-nhap.html");
            }
        }
        public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }
}

?>