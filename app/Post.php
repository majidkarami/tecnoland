<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postPhotos()
    {
        return $this->hasMany(PostPhoto::class);
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function postComments()
    {
        return $this->hasMany(PostComment::class);
    }
}
