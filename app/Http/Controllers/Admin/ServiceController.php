<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Requests\ServiceRequest;
use App\lib\Jdf;
use App\Product;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public $product;
    public $id;

    public function __construct(Request $request)
    {
        if (!$request->isMethod('DELETE')) {
            $id = $request->get('product_id');
            $this->id = $id;
        }
    }

    public function index()
    {
        $services = Service::where(['product_id' => $this->id, 'parent_id' => 0])->orderBy('id', 'DESC')->paginate(10);
        $id = request()->get('product_id');
        $product = Product::findOrFail($id);
        return view('admin.services.index', ['product' => $product, 'services' => $services]);
    }

    public function create()
    {
        $id = request()->get('product_id');
        $product = Product::findOrFail($id);
        return view('admin.services.create', ['product' => $product]);
    }

    public function store(ServiceRequest $request)
    {
        $service = new Service($request->all());
        $service->parent_id = 0;
        $service->saveOrFail();
        Session::flash('success', 'گارانتی با موفقیت اضافه شد.');
        $url = 'admin/services/' . $service->id . '/edit?product_id=' . $this->id;
        return redirect($url);
    }

    public function edit($id)
    {
        $service = Service::where(['id' => $id, 'product_id' => $this->id])->firstOrFail();
        $id = request()->get('product_id');
        $product = Product::findOrFail($id);
        return view('admin.services.edit', ['service' => $service, 'product' => $product]);
    }

    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $message = 'خطا در ویرایش اطلاعات';
        if ($service->update($request->all())) {
            $message = 'ویرایش با موفقیت انجام شد';
        }
        return redirect()->back()->with(['message' => $message]);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $id = request()->get('product_id');
        $product = Product::findOrFail($id);
        return view('admin.services.show', ['product' => $product, 'service' => $service]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        Service::where(['parent_id' => $id])->delete();
        Session::flash('error', 'گارانتی با موفقیت حذف شد.');
        return redirect()->back();
    }

    public function get_price(Request $request)
    {
        $product_id = $request->get('product_id');
        $date = $request->get('date');
        $service_id = $request->get('service_id');
        $product_color = Color::where(['product_id' => $product_id])->get();
        $service_price = Service::where(['parent_id' => $service_id, 'product_id' => $product_id, 'date' => $date])->pluck('price', 'color_id')->toArray();
        return view('admin.services.add_price', compact('product_color', 'service_price', 'product_id', 'date', 'service_id'));
    }

    public function set_price(Request $request)
    {
        $Jdf = new Jdf();
        $color = $request->get('color');
        $date = $request->get('time');
        $d = explode('-', $date);
        $time = $Jdf->jmktime(0, 0, 0, $d[1], $d[2], $d[0]);
        $service_id = $request->get('service_id');
        DB::table('services')->where(['parent_id' => $service_id, 'product_id' => $this->id, 'date' => $date])->delete();
        if (is_array($color)) {
            foreach ($color as $key => $value) {
                if (!empty($value)) {
                    DB::table('services')->insert([
                        'product_id' => $this->id,
                        'parent_id' => $service_id,
                        'color_id' => $key,
                        'name' => '-',
                        'price' => $value,
                        'time' => $time,
                        'date' => $date
                    ]);
                }
            }
        }
        Session::flash('success', 'گارانتی محصول با موفقیت اضافه شد.');
        return redirect()->back();
    }
}
