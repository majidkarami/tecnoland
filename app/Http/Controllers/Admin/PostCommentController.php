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

  public function edit($id)
  {
    $comment = PostComment::findOrFail($id);
<<<<<<< HEAD
    return view('admin.comments.edit', compact(['comment']));
=======
    return view('admin.blog.comments.edit', compact('comment'));
>>>>>>> 01d3e5a9eca60cb7c65ce7cb6097635fbd328519
  }

  public function update(Request $request, $id)
  {
    $comment = PostComment::findOrFail($id);
    $comment->description = $request->input('description');
    $comment->status = $request->input('status');
    $comment->save();

    Session::flash('success', 'نظر با موفقیت ویرایش شد');
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
