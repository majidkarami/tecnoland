<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\PostComment;


class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'description' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $postId = $request->post('postId');
        $post = Post::findOrFail($postId);
        if($post){
            $comment = new PostComment();
            $comment->description = $request->input('description');
            $comment->post_id = $post->id;
            $comment->status = 0;
            $comment->name = $request->input('name');
            $comment->email = $request->input('email');
            $comment->save();
          }
      Session::flash('success', 'دیدگاه شما پس از تایید مدیران ثبت می گردد');
      return back();
    }

    public function reply(Request $request)
    {
      $postId = $request->input('post_id');
      $parentId = $request->input('parent_id');

      $post = Post::findOrFail($postId);
      if($post){
        $comment = new PostComment();
        $comment->description = $request->input('description');
        $comment->parent_id = $parentId;
        $comment->post_id = $post->id;
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->status = 0;
        $comment->save();
      }
      Session::flash('success', 'دیدگاه شما پس از تایید مدیران ثبت می گردد');
      return back();
    }
}
