<?php

namespace App\Http\Controllers\Admin;

use App\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostCommentController extends Controller
{
    public function index(){
      $comments = PostComment::with('post')
        ->orderBy('created_at', 'desc')
        ->paginate(30);

      return view('admin.comments.index', compact(['comments']));
    }

    public function actions(Request $request, $id)
    {
      if($request->has('action')){
        if($request->input('action') == 'approved'){
          $comment = PostComment::findOrFail($id);
          $comment->status = 1;
          $comment->save();
          Session::flash('approved_comment', 'نظر کاربر تایید شد');
        }else{
          $comment = PostComment::findOrFail($id);
          $comment->status = 0;
          $comment->save();
          Session::flash('rejected_comment', 'نظر کاربر تایید نشد');
        }
      }
      return redirect('/admin/comments');
    }

  public function edit($id)
  {
    $comment = PostComment::findOrFail($id);
    return view('admin.comments.edit', compact(['comment']));
  }

  public function update(Request $request, $id)
  {
    $comment = PostComment::findOrFail($id);
    $comment->description = $request->input('description');
    $comment->save();

    Session::flash('update_comment', 'نظر با موفقیت ویرایش شد');
    return redirect('/admin/comments');
  }

  public function destroy($id)
  {
    $comment = PostComment::findOrFail($id);
    $comment->delete();
    Session::flash('delete_comment', 'نظر با موفقیت حذف شد');

    return redirect('admin/comments');
  }
}
