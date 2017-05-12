<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table="imgs";
    protected $fillable=["img_id","img_name","img_path","hash","label","ispublic","uid","uuid"];
    public $timestamps=false;
    protected $primaryKey="img_id";

    public static function getMostPopularImgs($page=0,$pagesize=9)
    {
        $imgs = Img::orderBy("refer_time","desc")->skip($page*$pagesize)->take($pagesize)->get(["img_name","img_id"]);
//        var_dump($imgs->toJson());
        return $imgs->toArray();
    }
}
