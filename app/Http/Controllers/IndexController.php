<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Img;
use Illuminate\Http\Request;
use App\Helper\CommonHelper;
use App\Model\RecentList;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

//use Illuminate\Session;
class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has("uuid") ){
            $this->uuid = $request->session()->get("uuid");
            $this->uid = User::where("uuid",$this->uuid)->first()['uid'];

//            echo $this->uuid;
        }else{
            $this->user = $this->GenerateTmpUser();
            $this->uid = User::get_uid_by_uuid($this->uuid)['uid'];

            $request->session()->put("uuid",$this->uuid);
//            $request->session()->save();
        }
        $lifetime = time() + 60 * 24 * 365; // one year
//        $request->session()->put('cookie_expires', $lifetime);
        Session::put('cookie_expires', $lifetime);
//        Config::set('session.$lifetime',$lifetime);

        return view('main');
//        $this->generate_index_view();
    }



    public function GenerateTmpUser()
    {
        $uuid = CommonHelper::gen_uuid();
        echo $uuid;
        $this->uuid = $uuid;
//        echo "==========";
//        echo $this->uuid;
//        User::create(['uuid'=>'asdf','uid'=>'1','uname'=>'namesd']);
        return User::create(['uuid'=>$uuid]);
    }

    public function generate_index_view()
    {
//        $recentlist = RecentList::getRecentImgByUuid($this->uid);
//        $toplist = Img::getMostPopularImgs();
//        var_dump($recentlist);
//        var_dump($toplist);
//        return View::make("")
//        echo "hha";
        return view('main');

    }




}
