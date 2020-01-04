<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * product_images
 * @property mixed product_id
 * @property mixed url
 */
class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['product_id', 'url'];
    public $timestamps = false;
}
