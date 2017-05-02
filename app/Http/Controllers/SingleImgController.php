<?php

namespace App\Http\Controllers;

use App\Model\DislikeList;
use Illuminate\Http\Request;
use App\Model\Img;
use App\Model\FavoriteList;
use App\Model\RecentList;

class SingleImgController extends Controller
{
    //
    function addImgReference(Request $request)

    {
        $uuid = $request->session()->get("uuid");
//        echo $request->imgid;
        $img = Img::where("img_id", $request->imgid)->get()->first();
//        dd($img);
        $img->refer_time += 1;
        $img->save();
        echo $img->refer_time;
    }

    function getImgInfoById(Request $request)

    {
//        $uuid = $request->session()->get("uuid");
//        echo $request->imgid;
        $imgs = Img::where("img_id", $request->imgid)->get(['img_id','img_name']);
        return $imgs.toJson();
    }



    function copyToClipboard()
    {
            //js
    }

    function addToFavorite(Request $request)
    {
        $uuid = $request->session()->get("uuid");
        $imgid = $request->imgid;
        $favorites = FavoriteList::where(['uuid'=>$uuid,'img_id'=>$imgid])->get();
        if(sizeof($favorites)==0){
            $data = array(
                'img_id'=>$imgid,
                'uuid'=>$uuid,
            );
            $result = FavoriteList::create($data);
            return $result->toJson();
        }

    }

    function addToDislikeList(Request $request)
    {
        $uuid = $request->session()->get("uuid");
        echo $uuid;
        $imgid = $request->imgid;
        $favorites = DislikeList::where(['uuid'=>$uuid,'img_id'=>$imgid])->get();
        if(sizeof($favorites)==0){
            $data = array(
                'img_id'=>$imgid,
                'uuid'=>$uuid,
                );
            DislikeList::create($data);
        }
    }

    function addToRecentList(Request $request)
    {
        $uuid = $request->session()->get("uuid");
//        echo $uuid;
        $imgid  = $request->imgid;
        $imgs = RecentList::where(["uuid"=>$uuid,"img_id"=>$imgid])->get();

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

