<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed email
 * @property array|string|null token
 */
class Email extends Model
{
    protected $fillable = ['email','token'];
}
