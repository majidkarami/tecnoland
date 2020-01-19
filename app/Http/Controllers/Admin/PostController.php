<?php

namespace App\Http\Controllers\Admin;

use App\PostCategory;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\PostPhoto;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postPhotos', 'postCategory', 'user')->paginate(10);
        return view('admin.blog.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::pluck('title', 'id');

        if (!empty($post_id)) {

            $image = PostPhoto::where(['post_id'=>$post_id])->get();
        }
        return view('admin.blog.posts.create', compact('categories','image'));
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
        $post->title = $request->input('title');

        if($request->input('slug')){
        $post->slug = make_slug($request->input('slug'));
        }else{
        $post->slug = make_slug($request->input('title'));
        }

        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        //$post->user_id = auth()->user()->id;
        $post->user_id = 1;
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->active = $request->input('active');
        $post->save();

        Session::flash('success', 'پست جدید با موفقیت ایجاد گردید');
        return redirect(route('blog.posts.index'));
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
        $post = Post::with('postCategory','postPhotos')->where('id', $id)->first();
        $categories = PostCategory::pluck('title', 'id');
        return view('admin.blog.posts.edit', compact(['post', 'categories']));
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
        $file->move('upload/posts/images/', $name);
        $photo = new PostPhoto();
        $photo->name = $file->getClientOriginalName();
        $photo->path = 'upload/posts/images/'.$name;
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
        $photo = PostPhoto::findOrFail($id);
        $url = public_path() . $photo->path;
        if(file_exists($url)) {
          unlink($url);
        }
        $photo->delete();
        $post->delete();
        Session::flash('success', '\u0645\u0637\u0644\u0628 \u0628\u0627 \u0645\u0648\u0641\u0642\u06cc\u062a \u062d\u0630\u0641 \u0634\u062f');

        return redirect(route('blog.posts.index'));
    }
    public function details($id)
    {
        $post = Post::findOrFail($id);
        $images = PostPhoto::where('post_id',$id)->get();
        return View('admin.blog.posts.details', compact('post','images'));
    }

    public function create_details(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ],[
            'description.required' => 'لطفا توضیحات مطلب را وارد کنید'
        ]);

        $post_id = $request->post('post_id');
        $post = Post::findOrFail($post_id);
        $post->description = $request->post('description');
        $post->saveOrFail();
        Session::flash('success', 'توضیحات پست با موفقیت ایجاد گردید.');
        return redirect()->back();
    }

    public function upload(Request $request, $id)
    {
        $files=$request->file('file');
        $file_name=md5($files->getClientOriginalName().time().$id).'.'.$files->getClientOriginalExtension();
        if($files->move('upload/posts/',$file_name))
        {
            $postPhoto=new PostPhoto();
            $postPhoto->user_id=1;
            $postPhoto->post_id=$id;
            $postPhoto->name=$files->getClientOriginalName();
            $postPhoto->path='upload/posts/'.$file_name;
            $postPhoto->saveOrFail();
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function del_post_img($id)
    {
        $img=PostPhoto::findOrFail($id);
        $url=$img->path;
        if(!empty($url))
        {
            if(file_exists($url))
            {
                $img->delete();
                unlink($url);
            }
        }
        return redirect()->back();
    }

}
