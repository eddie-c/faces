<?php
/**
 * Created by PhpStorm.
 * User: eddie
 * Date: 17-4-18
 * Time: 上午9:41
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

interface ImgList
{
    function getListByUuid(Request $request);
    function addImgToList(Request $request);
}