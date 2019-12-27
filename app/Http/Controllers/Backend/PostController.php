<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\PostPhoto;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('a');
        $posts = Post::with('photo', 'category', 'user')->paginate(2);
        dd($posts);
        return view('admin.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('admin.posts.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

      $post = new Post();
      if($file = $request->file('first_photo')){
        $name = time() . $file->getClientOriginalName() ;
        $file->move('images', $name);
        $photo = new Photo();
        $photo->name = $file->getClientOriginalName();
        $photo->path = $name;
        $photo->user_id = Auth::id();
        $photo->save();

        $post->photo_id = $photo->id;
      }

      $post->title = $request->input('title');

      if($request->input('slug')){
        $post->slug = make_slug($request->input('slug'));
      }else{
        $post->slug = make_slug($request->input('title'));
      }

      $post->description = $request->input('description');
      $post->category_id = $request->input('category');
      $post->user_id = Auth::id();
      $post->meta_description = $request->input('meta_description');
      $post->meta_keywords = $request->input('meta_keywords');
      $post->status = $request->input('status');
      $post->save();
      Session::flash('add_post', '\u0645\u0637\u0644\u0628 \u062c\u062f\u06cc\u062f \u0628\u0627 \u0645\u0648\u0641\u0642\u06cc\u062a \u0627\u0636\u0627\u0641\u0647 \u0634\u062f');
      return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('category')->where('id', $id)->first();
        $categories = Category::pluck('title', 'id');
        return view('admin.posts.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
      $post = Post::findOrFail($id);
      if($file = $request->file('first_photo')){
        $name = time() . $file->getClientOriginalName() ;
        $file->move('images', $name);
        $photo = new Photo();
        $photo->name = $file->getClientOriginalName();
        $photo->path = $name;
        $photo->user_id = Auth::id();
        $photo->save();

        $post->photo_id = $photo->id;
      }
      $post->title = $request->input('title');

      if($request->input('slug')){
        $post->slug = make_slug($request->input('slug'));
      }else{
        $post->slug = make_slug($request->input('title'));
      }
      $post->description = $request->input('description');
      $post->category_id = $request->input('category');
      $post->meta_description = $request->input('meta_description');
      $post->meta_keywords = $request->input('meta_keywords');
      $post->status = $request->input('status');
      $post->save();
      Session::flash('update_post', '\u0645\u0637\u0644\u0628 \u062c\u062f\u06cc\u062f \u0628\u0627 \u0645\u0648\u0641\u0642\u06cc\u062a \u0648\u06cc\u0631\u0627\u06cc\u0634 \u0634\u062f');
      return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::findOrFail($id);
      $photo = Photo::findOrFail($post->photo_id);
      unlink(public_path() . $post->photo->path);
      $photo->delete();
      $post->delete();
      Session::flash('delete_post', '\u0645\u0637\u0644\u0628 \u0628\u0627 \u0645\u0648\u0641\u0642\u06cc\u062a \u062d\u0630\u0641 \u0634\u062f');

      return redirect('admin/posts');
    }
}
