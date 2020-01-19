<?php

namespace App\Http\Controllers\Admin;

use App\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostCommentController extends Controller
{
    public function index()
    {
        $comments = PostComment::with('post')
        ->orderBy('created_at', 'desc')
        ->paginate(30);

        return view('admin.blog.comments.index', compact(['comments']));
    }

    public function actions(Request $request, $id)
    {
      if($request->has('action')){
        if($request->input('action') == 'approved'){
          $comment = PostComment::findOrFail($id);
          $comment->status = 1;
          $comment->save();
          Session::flash('success', 'نظر کاربر تایید شد');
        }else{
          $comment = PostComment::findOrFail($id);
          $comment->status = 0;
          $comment->save();
          Session::flash('error', 'نظر کاربر تایید نشد');
        }
      }
      return redirect(route('blog.comments.index'));
    }

    public function show($id)
    {
        $comment = PostComment::findOrFail($id);

        return view('admin.blog.comments.show', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|min:5'
        ]);
        $old_comment = PostComment::findOrFail($id);
        $new_comment = new PostComment();
        $new_comment->description = $request->input('description');
        $new_comment->status = 1;
        $new_comment->parent_id = $id;
        $new_comment->post_id = $old_comment->post_id;
        $new_comment->name = auth()->user->username;
        $new_comment->email = auth()->user->email;
        $new_comment->saveOrFail();

        Session::flash('success', 'پاسخ نظر با موفقیت ثبت شد');
        return redirect(route('blog.comments.index'));
    }

  public function destroy($id)
  {
    $comment = PostComment::findOrFail($id);
    $comment->delete();
    Session::flash('success', 'نظر با موفقیت حذف شد');

    return redirect(route('blog.comments.index'));
  }
}
