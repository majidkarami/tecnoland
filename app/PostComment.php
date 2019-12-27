<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
    public function replies(){
      return $this->hasMany(Comment::class, 'parent_id');
    }
}
