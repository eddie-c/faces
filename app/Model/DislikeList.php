<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DislikeList extends Model
{
    protected $fillable = ['uid','img_id','date','uuid'];
    public $timestamps = false;
    protected $table = 'dislike';
}
