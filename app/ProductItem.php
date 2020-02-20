<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $table='item_product';
    protected $fillable=['product_id','item_id','value'];
    public $timestamps=false;
}
