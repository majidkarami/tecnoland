<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int|string|null user_id
 * @property mixed is_active
 * @property string|string[]|null slug
 */
class Game extends Model
{
    protected $fillable = ['title', 'description', 'is_active', 'user_id', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
