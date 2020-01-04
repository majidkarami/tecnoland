<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::search($request->all());
        $data = $request->all();
        return view('admin.categories.index', compact('categories', 'data'));
    }

    public function create()
    {
        $cat_list = Category::get_cat_list();
        return view('admin.categories.create', compact('cat_list'));
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        if ($request->hasFile('img')) {
            $file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            if ($request->file('img')->move('upload/category', $file_name)) {
                $category->img = 'upload/category/' . $file_name;
            }
        }
        $category->saveOrFail();
        Session::flash('success', 'دسته جدید با موفقیت ایجاد شد.');
        return redirect(route('categories.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $cat_list = Category::get_cat_list();
        return View('admin.categories.edit', compact('cat_list', 'category'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->hasFile('img')) {
            $file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            if ($request->file('img')->move('upload/category', $file_name)) {
                $category->img = 'upload/category/' . $file_name;
            }
        }

        $category->saveOrFail($request->all());
        Session::flash('success', 'دسته با موفقیت ویرایش شد.');
        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $url = $category->img;
        $category->delete();
        if (!empty($url)) {
            unlink($url);
        }
        Session::flash('success', 'دسته با موفقیت حذف شد.');
        return redirect()->back();
    }

    public function del_img($id)
    {
        $category = Category::findOrFail($id);
        $url = $category->img;
        if (!empty($url)) {
            if (file_exists($url)) {
                $category->img = '';
                $category->update();
                unlink( $url);
            }

        }
        Session::flash('success', 'تصویر با موفقیت حذف شد.');
        return redirect()->back();
    }

}
