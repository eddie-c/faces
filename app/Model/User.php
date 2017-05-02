<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="users";
    protected $primaryKey="uid";
    protected $fillable=["uid","uname","upass","uuid"];
    public $timestamps=false;

    public static function get_uid_by_uuid($uuid)
    {
        return User::where("uuid",$uuid)->get(["uid"])->first();
    }
}
