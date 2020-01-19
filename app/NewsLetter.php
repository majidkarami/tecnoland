<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int done
 */
class NewsLetter extends Model
{
    protected $fillable = ['subject', 'content'];
}
