<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models
 *
 * @property string $name
 * @property string $value
 */
class Setting extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'value'];
}
