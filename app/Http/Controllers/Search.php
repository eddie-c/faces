<?php

namespace App\Http\Controllers;

use App\Model\Img;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Search extends Controller
{
    function searchImg(Request $request)
    {

        $searchtext = $request->input("searchtext");
        $result = Img::where("description","like","%".$searchtext."%")->get(['img_name','img_id']);
        return $result->toJson();
    }

    function showView(Request $request)
    {
        return View("search")->with("searchtext",$request->input("searchtext"));
    }

}
