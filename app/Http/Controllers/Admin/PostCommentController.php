<?php

namespace App\Http\Controllers\Admin;

use App\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index(){
      $comments = Comment::with('post')
        ->orderBy('created_at', 'desc')
        ->paginate(30);

      return view('admin.comments.index', compact(['comments']));
    }

    public function actions(Request $request, $id)
    {
      if($request->has('action')){
        if($request->input('action') == 'approved'){
          $comment = Comment::findOrFail($id);
          $comment->status = 1;
          $comment->save();
          Session::flash('approved_comment', 'نظر کاربر تایید شد');
        }else{
          $comment = Comment::findOrFail($id);
          $comment->status = 0;
          $comment->save();
          Session::flash('rejected_comment', 'نظر کاربر تایید نشد');
        }
      }
      return redirect('/admin/comments');
    }

  public function edit($id)
  {
    $comment = Comment::findOrFail($id);
    return view('admin.comments.edit', compact(['comment']));
  }

  public function update(Request $request, $id)
  {
    $comment = Comment::findOrFail($id);
    $comment->description = $request->input('description');
    $comment->save();

    Session::flash('update_comment', 'نظر با موفقیت ویرایش شد');
    return redirect('/admin/comments');
  }

  public function destroy($id)
  {
    $comment = Comment::findOrFail($id);
    $comment->delete();
    Session::flash('delete_comment', 'نظر با موفقیت حذف شد');

    return redirect('admin/comments');
  }
}
