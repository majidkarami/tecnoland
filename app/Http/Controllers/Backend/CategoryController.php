<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::with('childrenRecursive')
        ->where('parent_id', null)
        ->paginate(10);

        return view('admin.categories.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::with('childrenRecursive')
        ->where('parent_id', null)
        ->get();

      return view('admin.categories.create', compact(['categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name  = $request->input('name');
        $category->parent_id  = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect('/administrator/categories');
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
      $categories = Category::with('childrenRecursive')
        ->where('parent_id', null)
        ->get();
      $category = Category::findOrFail($id);
      return view('admin.categories.edit', ['categories'=> $categories, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name  = $request->input('name');
        $category->parent_id  = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect('/administrator/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::with('childrenRecursive')->where('id', $id)->first();
      if(count($category->childrenRecursive)>0){
        Session::flash('error_category', 'دسته بندی '.$category->name.' دارای زیر دسته است. بنابراین حذف آن امکان پذیر نمی باشد.');
        return redirect('/administrator/categories');
      }
      $category->delete();
      return redirect('/administrator/categories');
    }

  public function indexSetting($id)
  {
      $category = Category::findOrFail($id);
      $attributeGroups = AttributeGroup::all();
      return view('admin.categories.index-setting', compact(['category', 'attributeGroups']));
  }

  public function saveSetting(Request $request, $id)
  {

    $category = Category::findOrFail($id);
    $category->attributeGroups()->sync($request->attributeGroups);
    $category->save();

    return redirect()->to('/administrator/categories');
  }

  public function apiIndex()
  {
    $categories = Category::with('childrenRecursive')
      ->where('parent_id', null)
      ->get();

    $response =[
      'categories' => $categories
    ];
    return response()->json($response, 200);
  }
  public function apiIndexAttribute(Request $request)
  {
    $categories = $request->all();
    $attributeGroup = AttributeGroup::with('attributesValue', 'categories')
      ->whereHas('categories', function($q) use ($categories){
        $q->whereIn('categories.id', $categories);
      })->get();
    $response =[
      'attributes' => $attributeGroup
    ];
    return response()->json($response, 200);
  }
}
