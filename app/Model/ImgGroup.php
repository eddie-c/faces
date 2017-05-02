<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImgGroup extends Model
{
    protected $table="img_group";
    protected $fillable=["group_id","group_name"];
    public $timestamps=false;
}
