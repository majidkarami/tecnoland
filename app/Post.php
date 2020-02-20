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

    public function postPhoto($postId)
    {
        return $this->hasOne(PostPhoto::class)->where('post_id', $postId)->first();
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function postComments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function postLikes()
    {
        return $this->hasMany(PostLike::class);
    }
}
