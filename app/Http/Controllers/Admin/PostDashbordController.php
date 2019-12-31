<?php

namespace App\Http\Controllers\Admin;

use App\PostCategory;
use App\PostPhoto;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index()
  {
    $postsCount = Post::count();
    $categoriesCount = Category::count();
    $photosCount = Photo::count();
    $usersCount = User::count();
    $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
    $users = User::orderBy('created_at', 'desc')->limit(5)->get();
    return view('admin.dashboard.index', compact(['postsCount', 'categoriesCount', 'photosCount', 'usersCount', 'posts', 'users']));
  }
}
