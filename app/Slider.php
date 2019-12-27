<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|string|null title
 * @property string url
 * @property string img
 */
class Slider extends Model
{
    protected $uploads = '/storage/sliders/';

    protected $fillable=['title','img','url'];

}
