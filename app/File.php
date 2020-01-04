<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Review
 * @property mixed type
 * @property mixed product_id
 * @property mixed url
 */
class File extends Model
{
    protected $table='file';
    protected $fillable=['product_id','url','type'];
    public $timestamps=false;
}
