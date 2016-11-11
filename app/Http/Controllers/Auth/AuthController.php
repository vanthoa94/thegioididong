<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Input;
use Redirect;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function changepass()
    {
        $userInfo = Session::get("userInfo");
        if($userInfo!="")
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

            return View("fontend.signin.userinfo",array("categorys"=>$getCategorys,"menus"=>$menus,"slides"=>$slides,"website"=>$website,"news"=>$news,"NewsCate"=>$NewsCate,"ads"=>$ads,"productSelling"=>$productSelling,"cateApps"=>$cateApps,"convert"=>$convert,"tags"=>$tags,"branches"=>$branches,"agency"=>$agency,"support"=>$support,"productCateIDIndex"=>$productCateIDIndex));
        }
        else
        {
            return Redirect::to("dang-nhap.html");
        }

    }
    public function post_changepass()
    {
       $th = new ControllerDB();
        $user = Session::get("userInfo");
       $update = $th->updateUser(trim($user["username"]),trim(Input::get('txtPass_cu')),trim(Input::get('txtPass_new')));
       if($update==true)
       {
           Session::put("doimatkhauthanhcong",1);
           return Redirect::to("doi-mat-khau");
       }
        else
        {
            Session::put("doimatkhauthanhcong",0);
            return Redirect::to("doi-mat-khau");
        }
    }
    public function sigout()
    {
        Session::forget("doimatkhauthanhcong");
        Session::forget("userInfo");
        Session::forget("isuser");
        return Redirect::to("/");
    }
    public function getNewsWhereName($name)
    {
        $th = new ControllerDB();
        return $th->getNewsWhereName($name);
    }
}
