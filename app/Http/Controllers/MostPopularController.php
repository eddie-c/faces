<?php

namespace App\Http\Controllers;

use App\Model\Img;
use Illuminate\Http\Request;

class MostPopularController extends Controller implements ImgList
{
    //
    function getListByUuid(Request $request)
    {
        if (!$request->session()->has("uuid")) {
            return false;
        }

        $uuid = $request->session()->get("uuid");
        $ids_raw = Img::getMostPopularImgs();
        $ids = array();

        foreach($ids_raw as $id){
            $ids[] =  $id['img_id'];
        }

        $imgurls = Img::whereIn('img_id',$ids)->get(['img_id','img_name']);
        return $imgurls->toJson();

    }

    function addImgToList(Request $request)
    {

    }
}
