<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    protected $fillable = ['uid','img_id','date','uuid'];
    public $timestamps = false;
    protected $table = 'favorites';
    public static function getFavoriteImgByUuid($uuid)
    {
        $recents = FavoriteList::where("uuid",$uuid)->get(["img_id"]);
        return $recents->toArray();
    }
}
