<?php

namespace App\Http\Controllers\User;

use App\Bookmark;
use App\CatProduct;
use App\Http\Controllers\Controller;
use App\Amazing;
use App\Cart;
use App\Category;
use App\Color;
use App\Comment;
use App\Discount;
use App\Filter;
use App\GiftCart;
use App\IndexSearch;
use App\Item;
use App\Product;
use App\ProductScore;
use App\Question;
use App\ReView;
use App\Service;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use View;
use DB;
use Auth;
use Validator;
use Session;

class SiteController extends Controller
{
    public function __construct()
    {
        $cat = Category::where('parent_id', 0)->get();
        View::share('category', $cat);
    }

    public function index()
    {
//        dd(time()+120*60);
        $slider = Slider::orderBy('id', 'DESC')->limit(5)->get();
        $product = Product::with('get_img')->where(['product_status' => 1, 'show_product' => 1])->orderBy('id', 'DESC')->limit(15)->get();
        $order_product = Product::with('get_img')->where(['product_status' => 1, 'show_product' => 1])->orderBy('order_product', 'DESC')->limit(15)->get();
        $view_product = Product::with('get_img')->where(['product_status' => 1, 'show_product' => 1])->orderBy('view', 'DESC')->limit(15)->get();
        $cat_product = CatProduct::get();
        $random_product = Product::with('get_img')->where(['product_status' => 1, 'show_product' => 1, 'special' => 1])->inRandomOrder()->limit(10)->get();
        $amazing = Amazing::with('get_img')->with('get_product')->orderBy('id', 'DESC')->get();
        $old_amazing = Amazing::orderBy('timestamp', 'DESC')->first();
        return View('technoland.site.index', compact('slider', 'product', 'order_product', 'view_product', 'amazing', 'old_amazing', 'cat_product', 'random_product'));
    }

    public function show($code, $title)
    {
        $product = Product::with(['get_images', 'get_colors', 'get_cats', 'get_items'])
            ->where(['code_url' => $code, 'title_url' => $title, 'show_product' => 1])->firstOrFail();

        $products_linked = $this->product_linked($product->id);

        $product->view = $product->view + 1;
        $product->update();
        $review = ReView::where(['product_id' => $product->id])->first();
        $items = Item::get_product_item($product->id);
        $item_value = DB::table('item_product')->where('product_id', $product->id)->pluck('value', 'item_id')->toArray();
        $score_data = ProductScore::get_score($product->id);
        $pro_amazing = Amazing::with(['get_img', 'get_product'])->where('product_id', $product->id)->first();
        $amazing = Amazing::with('get_img')->with('get_product')->orderBy('id', 'DESC')->get();
        $bookmark = Bookmark::where('product_id', $product->id)->where('user_id', auth()->id())->first();
        return view('technoland.site.show', compact('products_linked', 'product', 'review', 'items', 'item_value', 'score_data', 'amazing', 'pro_amazing', 'bookmark'));
    }

    public function product_linked($id)
    {
        $min_cat_id = DB::table('cat_product')->where('product_id', $id)->pluck('cat_id', 'id')->min();
        $cat = Category::findOrFail($min_cat_id);
        $products = DB::table('cat_product')->where('cat_id', $cat->id)->pluck('product_id', 'id');
        return $products;
    }

    public function set_service(Request $request)
    {
        $service_id = $request->get('service_id');
        $product_id = $request->get('product_id');
        $color_id = $request->get('color_id');
        $product = Product::with('get_service_name')->find($product_id);
        $colors = $product->get_colors;
        $check = Service::where(['parent_id' => $service_id, 'product_id' => $product_id, 'color_id' => $color_id])->orderby('id', 'DESC')->first();
        return View('technoland.include.info_box', ['colors' => $colors, 'service' => $check, 'color_id' => $color_id, 'product' => $product, 'service_id' => $service_id]);
    }

    public function cart(Request $request)
    {
        $product_id = $request->get('product_id', 0);
        $color_id = $request->get('color_id', 0);
        $service_id = $request->get('service_id', 0);
        $product = Product::findOrFail($product_id);
        $service = Service::where(['product_id' => $product_id, 'color_id' => $color_id, 'parent_id' => $service_id])->first();
        if ($service) {
            Cart::add_cart($product_id, $color_id, $service_id);
        } else {
            if ($color_id == 0 && $service_id != 0) {
                $service = Service::findOrFail($service_id);
                Cart::add_cart($product_id, $color_id, $service_id);
            } elseif ($color_id != 0 && $service_id == 0) {
                Color::where(['id' => $color_id, 'product_id' => $product_id])->firstOrFail();
                Cart::add_cart($product_id, $color_id, $service_id);
            } elseif ($color_id == 0 && $service_id == 0) {
                Cart::add_cart($product_id, $color_id, $service_id);
            }
        }

        return redirect('Cart');

    }

    public function show_cart()
    {
        return View('technoland.site.cart');
    }

    public function del_cart(Request $request)
    {
        if ($request->ajax()) {
            $product_id = $request->get('product_id', 0);
            $color_id = $request->get('color_id', 0);
            $service_id = $request->get('service_id', 0);
            Cart::remove($product_id, $service_id, $color_id);
//            $view_name = $this->view . 'include/ajax_cart';
            return redirect()->back();
        }
    }

    public function change_cart(Request $request)
    {
        if ($request->ajax()) {
            $product_id = $request->get('product_id', 0);
            $color_id = $request->get('color_id', 0);
            $service_id = $request->get('service_id', 0);
            $number = $request->get('number', 0);
            Cart::change($product_id, $service_id, $color_id, $number);

            return View('technoland.include.ajax_cart');
        }
    }

    public function check_login(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::check()) {
                ?>
                <?php

            } else {
                ?>
                <script>
                    $("#myModal").modal('show');
                </script>
                <?php
            }
        }
    }

    public function comment_form($product)
    {
        $e = explode('-', $product);
        if (sizeof($e) == 2) {
            if ($e[0] == 'Com') {
                $user_id = Auth::user()->id;
                $product = Product::with('get_img')->findOrFail($e[1]);
                $score = ProductScore::with('get_user')->where(['user_id' => $user_id, 'product_id' => $product->id])->first();
                $comment = Comment::where(['user_id' => $user_id, 'product_id' => $product->id])->first();

                return View('technoland.site.comment_form', ['product' => $product, 'score' => $score, 'comment' => $comment]);
            } else {
                return view(404);
            }
        } else {
            return view(404);
        }
    }

    public function add_score(Request $request)
    {
        $range = $request->get('range');
        $product_id = $request->get('product_id');
        if (is_array($range)) {
            $user_id = Auth::user()->id;
            $count = ProductScore::where(['user_id' => $user_id, 'product_id' => $product_id])->count();
            $time = time();
            if ($count == 0) {
                $score_value = '';
                foreach ($range as $key => $value) {
                    settype($value, 'integer');
                    $v = is_integer($value) ? $value : 0;
                    $score_value .= $key . '_' . $value . '@#';
                }
                DB::table('product_score')->insert([
                    'product_id' => $product_id,
                    'value' => $score_value,
                    'user_id' => $user_id,
                    'time' => $time
                ]);
            }

        }
        Session::flash('success', 'امتیاز با موفقیت ثبت گردید.');
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        $Validator = Validator::make($request->all(),
            ['subject' => 'required', 'comment_text' => 'required'], [], ['subject' => 'عنوان نقد و بررسی', 'comment_text' => 'متن']);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput();
        } else {
            $product_id = $request->get('product_id');
            $product = Product::findOrFail($product_id);
            $user_id = Auth::user()->id;
            $count = ProductScore::where(['user_id' => $user_id, 'product_id' => $product_id])->count();
            if ($count > 0) {

                $advantages = $request->get('advantages');
                $disadvantages = $request->get('disadvantages');
                $a = '';
                $d = '';
                if (is_array($advantages)) {
                    foreach ($advantages as $key => $value) {
                        $a .= $value . '@$E@';
                    }
                }
                if (is_array($disadvantages)) {
                    foreach ($disadvantages as $key => $value) {
                        $d .= $value . '@$E@';
                    }
                }
                $Comment = new Comment();
                $Comment->subject = $request->get('subject');
                $Comment->product_id = $product_id;
                $Comment->comment_text = $request->get('comment_text');
                $Comment->advantages = $a;
                $Comment->disadvantages = $d;
                $Comment->user_id = $user_id;
                $Comment->status = 0;
                $Comment->save();

            }
            Session::flash('success', 'نظر شما با موفقیت ثبت گردید.');
            return redirect()->back();
        }

    }

    public function get_tab_data(Request $request)
    {
        $tab_id = $request->get('tab_id');
        $product_id = $request->get('product_id');
        define('product_id', $product_id);
        if ($request->ajax()) {
            if ($tab_id == 'comment') {

                $score = ProductScore::with(['get_comment' => function ($query) {
                    $query->where(['product_id' => product_id, 'status' => 1]);
                }])->where(['product_id' => $product_id])->orderBy('id', 'DESC')->paginate(10);
                return View('technoland.include.show_comment', ['score' => $score, 'product_id' => $product_id]);
            } elseif ($tab_id == 'question') {
                $question = Question::with('get_parent')->where(['product_id' => $product_id, 'status' => 1, 'parent_id' => 0])->orderBy('id', 'DESC')->paginate(10);
                return View('technoland.include.add_question', ['product_id' => $product_id, 'question' => $question]);
            } else {
                return 'error';
            }
        }
    }

    public function add_question(Request $request)
    {
        $product_id = $request->get('product_id');
        $Validator = Validator::make($request->all(),
            ['question' => 'required'], [], ['question' => 'متن پرسش']);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput();
        } else {
            $user_id = Auth::user()->id;
            Product::findOrFail($product_id);
            $Question = new Question($request->all());
            $Question->time = time();
            $Question->user_id = $user_id;
            $Question->status = 0;
            $Question->save();
            Session::put('status', 'پرسش شما با موفقیت ثبت شده و بعد از تایید مدیریت نمایش داده میشه');
            return redirect()->back();
        }
    }

    public function compare($product1, $product2 = null, $product3 = null, $product4 = null)
    {
        $array = ['product1' => $product1, 'product2' => $product2, 'product3' => $product3, 'product4' => $product4];
        $data = array();
        foreach ($array as $key => $value) {
            if (!empty($value)) {
                $a = explode('-', $value);
                if (sizeof($a) == 2) {
                    if ($a[0] == 'Com') {

                        $product_id = $a[1];
                        $data[$key] = $product_id;
                    }
                }
            }
        }

        $items_id = Item::check_item_product($data);
        $mode = collect($items_id)->mode();
        $products = array();
        $product_items = array();
        if (sizeof($mode) == 1) {
            $id = $mode[0];
            $i = Item::findOrFail($id);
            $cat_list = Category::where('parent_id', $i->cat_id)->pluck('cat_name', 'id')->toArray();
            $items = Item::with('get_child')->where(['cat_id' => $i->cat_id, 'parent_id' => 0])->get();
            $i = 0;
            foreach ($items_id as $key => $value) {
                if ($value == $id) {
                    $product = Product::with('get_img')->where(['id' => $key, 'show_product' => 1])->first();
                    $products[$i] = $product;

                    $product_items[$key] = DB::table('item_product')->where(['product_id' => $key])->pluck('value', 'item_id')->toArray();

                    $i++;
                }
            }
            return View('technoland.site.compare', ['items' => $items, 'product_items' => $product_items, 'products' => $products, 'cat_list' => $cat_list]);
        } else {
            return view('404');
        }

    }

    public function get_compare_product(Request $request)
    {
        $cat_id = $request->get('cat_id');
        $product_id = DB::table('cat_product')->where('cat_id', $cat_id)->pluck('product_id', 'id')->toArray();
        $product = Product::with('get_img')->select(['title', 'code', 'id'])->whereIn('id', $product_id)->where(['show_product' => 1])->OrderBy('view', 'DESC')->limit(40)->get()->toJson();

        return $product;
    }

    public function check_discount_code(Request $request)
    {
        $price = Session::get('price', 0);
        $code = $request->get('discount_code');
        $discount = Discount::where(['code' => $code])->get();
        if (sizeof($discount) > 0) {
            $price = Session::get('price', 0);
            $r = Discount::check_discount($discount, $price);
            if ($r) {
                Session::put('discount', $r);

                $price2 = Cart::getPrice();

                echo 'کد تخفیف وارد شده صحیح می باشد مبلغ نهایی برای پرداخت : ' . $price2;
            } else {
                return 'error';
            }
        } else {
            return 'error';
        }


    }

    public function check_gift_cart(Request $request)
    {
        $user_id = Auth::user()->id;
        $gift_cart = $request->get('gift_cart');
        $p = Cart::getPrice();
        $time = time();
        $r = GiftCart::where(['user_id' => $user_id, 'code' => $gift_cart,
            'status' => 0])->where('time', '>=', $time)->first();
        if ($r) {
            $gift_array = Session::get('gift_list', []);
            if (!array_key_exists($r->id, $gift_array)) {

                $gift_array[$r->id] = ($r->value - $r->value2);
                Session::put('gift_list', $gift_array);
                $p = Cart::getPrice();
                echo 'کارت هدیه وارد شده با کد ' . $gift_cart . '  صحیح می باشد و مبلغ کارت هدیه از هزینه سفارش کسر شد مبلغ نهایی برای پرداخت : ' . number_format($p) . ' تومان';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    public function search(Request $request)
    {

        if ($request->has('text')) {
            $Search_text = $request->get('text');
            $product = IndexSearch::get_product($Search_text, $request->get('type', 1), $request->get('product_status', 0));
            if ($request->ajax()) {
                $cat_url = $request->get('cat_url');
                return View('technoland.include.product_list2', compact('product', 'cat_url', 'Search_text'));
            } else {
                return View('technoland.site.search-header', compact('product', 'Search_text'));
            }
        } else {
            return redirect('');
        }

    }

    public function search_mob(Request $request)
    {
        if ($request->has('text')) {
            $Search_text = $request->get('text');
            $product = IndexSearch::get_product($Search_text, $request->get('type', 1), $request->get('product_status', 0));
            if ($request->ajax()) {
                $cat_url = $request->get('cat_url');
                return View('technoland.include.product_list2', compact('product', 'cat_url', 'Search_text'));
            } else {
                return View('technoland.site.search-header', compact('product', 'Search_text'));
            }
        } else {
            return redirect('');
        }

    }


    public function marked(Request $request)
    {
        if ($request->ajax()) {
            $bookmark = new Bookmark();
            $bookmark->product_id = $request->product_id;
            $bookmark->user_id = auth()->id();
            $bookmark->save();
//            alert()->success('آگهی نشان شد!');
        }
        return redirect()->back();

    }

    public function del_marked(Request $request)
    {
        if ($request->ajax()) {
            $bookmark = Bookmark::where('product_id', $request->product_id)->where('user_id', auth()->id())->first();
            $bookmark->delete();
//            alert()->error('آگهی بی نشان شد!');
        }
        return redirect()->back();
    }
}
