<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\File;
use App\Filter;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ReviewRequest;
use App\Item;
use App\Product;
use App\ProductImage;
use App\ReView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request->all());
        $data = $request->all();
        return View('admin.products.index', compact('products', 'data'));
    }

    public function create()
    {
        $cat_list = Product::get_cat_list();
        return View('admin.products.create', compact('cat_list'));
    }

    public function store(ProductRequest $request)
    {
        $Product = new Product($request->all());

        $url = str_replace('-', '', $Product->title);
        $url = str_replace('/', '', $url);
        $Product->title_url = preg_replace('/\s+/', '-', $url);

        $Product->product_status = ($request->has('product_status')) ? $request->get('product_status') : 0;
        $Product->special = ($request->has('special')) ? $request->get('special') : 0;

        $url = str_replace('-', '', $Product->code);
        $url = str_replace('/', '', $url);
        $Product->code_url = preg_replace('/\s+/', '-', $url);

        $Product->view = 0;
        $Product->order_product = 0;
        $Product->saveOrFail();
        $cat = $request->get('cat');
        if (is_array($cat)) {
            foreach ($cat as $key => $value) {
                DB::table('cat_product')->insert(['product_id' => $Product->id, 'cat_id' => $value]);
            }
        }

        $color_name = $request->get('color_name');
        $color_code = $request->get('color_code');
        if (is_array($color_name)) {
            foreach ($color_name as $key => $value) {
                if (!empty($value) && !empty($color_code[$key])) {
                    DB::table('color_product')->insert(['product_id' => $Product->id, 'color_name' => $value, 'color_code' => $color_code[$key]]);

                }
            }
        }
        Session::flash('success', 'محصول با موفقیت اضافه شد.');
        return redirect(route('products.index'));

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::with('get_colors')->findOrFail($id);
        $cat_list = Product::get_cat_list();
        $product_cat = Product::get_cat($id);
        return View('admin.products.edit', compact('product', 'cat_list', 'product_cat'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $url = str_replace('-', '', $request->title);
        $url = str_replace('/', '', $url);
        $product->title_url = preg_replace('/\s+/', '-', $url);

        $url = str_replace('-', '', $request->code);
        $url = str_replace('/', '', $url);
        $product->code_url = preg_replace('/\s+/', '-', $url);


        $product->product_status = ($request->has('product_status')) ? $request->get('product_status') : 0;
        $product->special = ($request->has('special')) ? $request->get('special') : 0;

        DB::table('cat_product')->where('product_id', $product->id)->delete();
        $cat = $request->get('cat');
        if (is_array($cat)) {
            foreach ($cat as $key => $value) {
                DB::table('cat_product')->insert(['product_id' => $product->id, 'cat_id' => $value]);
            }
        }
        $product->update($request->all());

        $color_name = $request->get('color_name');
        $color_code = $request->get('color_code');
        if (is_array($color_name)) {
            foreach ($color_name as $key => $value) {
                if ($key > 0) {
                    if (!empty($value)) {
                        $color_product =  DB::table('color_product')->where('id', $key)->where('color_name',$value)->get();
                      if (sizeof($color_product)>0){
                          DB::table('color_product')->where('id', $key)->where('color_name',$value)->update(['color_name' => $value, 'color_code' => $color_code[$key]]);
                      }else{
                          DB::table('color_product')->insert(['product_id' => $product->id, 'color_name' => $value, 'color_code' => $color_code[$key]]);
                      }
                    } else {
                        DB::table('color_product')->where('id', $key)->delete();

                    }
                } else {
                    if (!empty($value) && !empty($color_code[$key])) {
                        DB::table('color_product')->insert(['product_id' => $product->id, 'color_name' => $value, 'color_code' => $color_code[$key]]);

                    }
                }
            }
        }
        Session::flash('success', 'محصول با موفقیت ویرایش شد.');
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        DB::table('cat_product')->where('product_id', $id)->delete();
        DB::table('color_product')->where('product_id', $id)->delete();
        Session::flash('success', 'محصول با موفقیت حذف شد.');
        return redirect()->back();
    }

    public function gallery(Request $request)
    {
        $id = $request->get('id');
        $product = Product::findOrFail($id);
        $image = ProductImage::where('product_id', $id)->get();
        return View('admin.products.gallery', compact('product', 'image'));
    }

    public function upload(Request $request)
    {
        $product_id = $request->get('id');
        $files = $request->file('file');
        $type = $request->get('type');
        $file_name = md5($files->getClientOriginalName() . time() . $product_id) . '.' . $files->getClientOriginalExtension();
        if ($files->move('upload/product/', $file_name)) {
            if ($type) {
                $ProductImage = new File();
                $ProductImage->type = $type;
            } else {
                $ProductImage = new ProductImage();
            }
            $ProductImage->product_id = $product_id;
            $ProductImage->url = 'upload/product/' . $file_name;
            $ProductImage->save();
            return 1;
        } else {
            return 0;
        }
    }

    public function del_product_img($id)
    {
        $img = ProductImage::findOrFail($id);
        $url = $img->url;
        if (!empty($url)) {
            if (file_exists($url)) {
                $img->delete();
                unlink($url);
            }
        }
        return redirect()->back();
    }

    public function add_review_form(Request $request)
    {
        $product_id = $request->get('product_id');
        $product = Product::findOrFail($product_id);
        $review = ReView::where('product_id', $product_id)->first();
        $image = File::where(['product_id' => $product_id, 'type' => 'review'])->get();
        return view('admin.products.add_review', compact('product', 'image', 'review'));
    }

    public function add_review(ReviewRequest $request)
    {
        $review = ReView::where('product_id', $request->get('product_id'))->first();
        if ($review) {
            $review->update($request->all());
        } else {
            $review = new ReView($request->all());
            $review->save();
        }

        return redirect()->back();
    }

    public function del_review_img($id)
    {
        $img = File::findOrFail($id);
        $url = $img->url;
        if (!empty($url)) {
            if (file_exists($url)) {
                $img->delete();
                unlink($url);
            }
        }
        return redirect()->back();
    }

    public function add_item_form($id)
    {
        $product = Product::findOrFail($id);
        $items = Item::get_product_item($id);
        $item_value = DB::table('item_product')->where('product_id', $product->id)->pluck('value', 'item_id')->toArray();
        return View('admin.products.add_item', compact('product', 'items', 'item_value'));
    }

    public function add_item_product(Request $request)
    {
        $item = $request->get('item');
        $product_id = $request->get('product_id');
        if (is_array($item)) {
            DB::table('item_product')->where(['product_id' => $product_id])->delete();
            foreach ($item as $key => $value) {
                DB::table('item_product')->insert([
                    'item_id' => $key,
                    'value' => $value,
                    'product_id' => $product_id
                ]);
            }
        }
        return redirect()->back();
    }

    public function add_filter_form($id)
    {
        $filter_value = Filter::get_value($id);
        $product = Product::findOrFail($id);
        $filters = Filter::get_product_filter($id);
        return View('admin.products.add_filter', compact('filters', 'product', 'filter_value'));
    }

    public function add_filter_product(Request $request)
    {
        $product_id = $request->get('product_id');
        $filter = $request->get('filter');
        $filters = $request->get('filters');
        if (is_array($filter)) {
            DB::table('filter_product')->where(['product' => $product_id])->delete();
            foreach ($filter as $key => $value) {
                DB::table('filter_product')->insert(
                    [
                        'product' => $product_id,
                        'filter_id' => $key,
                        'value' => $value
                    ]
                );
            }
        }
        if (is_array($filters)) {
            foreach ($filters as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    DB::table('filter_product')->insert(
                        [
                            'product_id' => $product_id,
                            'filter_id' => $key,
                            'value' => $value2
                        ]
                    );
                }
            }
        }

        return redirect()->back();
    }
}
