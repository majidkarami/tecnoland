<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use App\PostLike;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::with('user', 'postCategory', 'postPhotos')
        ->where('active', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(6);
      $categories = PostCategory::all();

      return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $posts = Post::with('user', 'postCategory', 'postPhotos')
          ->where('active', 1)
          ->orderBy('created_at', 'desc')
          ->paginate(6);
        $categories = PostCategory::all();

        $post = Post::with(['user','postCategory', 'postPhotos',
        'postComments'=>function($q){
            $q->where('status', 1)
              ->where('parent_id', null);
          }, 'postComments.replies'=>function($q){
            $q->where('status', 1);
          }])
          ->where('slug', $slug)
          ->where('active', 1)
          ->first();
        $categories = PostCategory::all();
        $post->increment('view');

        $postLike = PostLike::where('post_id', $post->id)->where('user_id', auth()->id())->first();
        $countLike = PostLike::count();

        return view('blog.show', compact('posts', 'post', 'categories', 'postLike','countLike'));
    }

    public function like(Request $request)
    {
        $like = new PostLike();
        $like->user_id = auth()->id();
        $like->post_id = $request->post_id;
        $like->like = 1;
        $like->save();

        return redirect()->back();
    }

    public function dislike(Request $request)
    {
        $post_id = $request->post_id;
        $dislike = PostLike::where('post_id', $post_id)->where('user_id', auth()->id())->first();
        $dislike->delete();

        return redirect()->back();
    }
}
