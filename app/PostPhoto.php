<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
    // protected $uploads = '/images/';

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function getPathAttribute($photo)
    {
      return $this->uploads . $photo;
    }

    public function post()
    {
      return $this->belongsTo(Post::class,'post_id', 'id');
    }
}
