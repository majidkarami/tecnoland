<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=['color_name','color_code','product_id'];
    public $timestamps=false;
}
