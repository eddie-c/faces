<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table="label";
    protected $fillable=["label_id","label_name"];
    public $timestamps=false;
}
