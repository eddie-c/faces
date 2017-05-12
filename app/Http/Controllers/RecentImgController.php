<?php

namespace App\Http\Controllers;

use App\Model\RecentList;
use App\Model\User;
use App\Model\Img;
use Illuminate\Http\Request;

class RecentImgController extends Controller implements ImgList
{

    public function beenlogin(Request $request, $uid)
    {
        if ($request->session()->has("uuid")) {
            return true;
        } else {
            return false;
        }
    }

    public function getMostPopularImgs()
    {
        return Img::getMostPopularImgs();
    }

    public function addImgReference(Request $request)
    {
        $uuid = $request->session()->get("uuid");
//        echo $request->imgid;
        $img = Img::where("img_id", $request->imgid)->get()->first();
//        dd($img);
        $img->refer_time += 1;
        $img->save();
        echo $img->refer_time;
    }

//    public function addImgToRecentList(Request $request)
//    {
//        $uuid = $request->session()->get("uuid");
////        echo $uuid;
//        $imgid  = $request->imgid;
//        $imgs = RecentList::where(["uuid"=>$uuid,"img_id"=>$imgid])->get();
////        echo sizeof($imgs);
////        echo ":::";
//        if(sizeof($imgs)==0){
//            $data = array(
//                'img_id'=>$imgid,
//                'uuid'=>$uuid,
//            );
//            RecentList::create($data);
//        }else{
//            $mysqltime=date('Y-m-d H:i:s',time());
//            RecentList::where(["uuid"=>$uuid,"img_id"=>$imgid])->update(['date'=>$mysqltime]);
//        }
//    }

    public function getListByUuid(Request $request)
    {
        if (!$request->session()->has("uuid")) {
            return false;
        }

        $uuid = $request->session()->get("uuid");
//        echo $uuid;
        $ids_raw = RecentList::getRecentImgByUuid($uuid);
        $ids = array();
//        echo $ids;
        foreach($ids_raw as $id){
//            echo $id['img_id'].'x';
//            var_dump($id);
            $ids[] =  $id['img_id'];
        }
//        var_dump($ids);
        $imgurls = Img::whereIn('img_id',$ids)->get(['img_id','img_name']);
//        foreach($imgurls as $url){
//            echo $url['img_name'];
//        }
        return $imgurls->toJson();
//        dd($imgurls);
    }

    function addImgToList(Request $request)
    {
        // TODO: Implement addImgToList() method.
        $uuid = $request->session()->get("uuid");
//        echo $uuid;
        $imgid  = $request->imgid;
        $imgs = RecentList::where(["uuid"=>$uuid,"img_id"=>$imgid])->get();
//        echo sizeof($imgs);
//        echo ":::";
        if(sizeof($imgs)==0){
            $data = array(
                'img_id'=>$imgid,
                'uuid'=>$uuid,
            );
            RecentList::create($data);
        }else{
            $mysqltime=date('Y-m-d H:i:s',time());
            RecentList::where(["uuid"=>$uuid,"img_id"=>$imgid])->update(['date'=>$mysqltime]);
        }
    }
}
