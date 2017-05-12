<?php

namespace App\Http\Controllers;

use App\Model\FavoriteList;
use Illuminate\Http\Request;
use App\Model\Img;

class FavoriteImgController extends Controller
{
    public function getListByUuid(Request $request)
    {
        if (!$request->session()->has("uuid")) {
            return false;
        }

        $uuid = $request->session()->get("uuid");
//        echo $uuid;
        $ids_raw = FavoriteList::getFavoriteImgByUuid($uuid);
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
}
