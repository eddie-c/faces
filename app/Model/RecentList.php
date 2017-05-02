<?php

namespace App\Model;

use App\Http\Controllers\ImgList;
use Illuminate\Database\Eloquent\Model;

class RecentList extends Model
{
    protected $table="recent_list";
    protected $fillable=["uid","img_id","date",'uuid'];
    public $timestamps=false;

    public static function getRecentImgByUuid($uuid)
    {
        $recents = RecentList::where("uuid",$uuid)->get(["img_id"]);
        return $recents->toArray();
    }

}
