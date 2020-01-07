<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use App\Http\Requests\DiscountRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DiscountController extends Controller
{

    public function index(Request $request)
    {
        $discounts = Discount::orderBy('id', 'DESC')->paginate(10);
        return view('admin.discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discounts.create');
    }

    public function store(DiscountRequest $request)
    {
        $discount = new Discount($request->all());
        if (empty($request->get('code_time')) or !is_numeric($request->get('code_time'))) {
            $discount->time = 0;
            $discount->code_time = 0;
        } else {
            $t = time() + $request->get('code_time') * 3600 * 24;
            $discount->time = $t;

        }

        $discount->saveOrFail();
        Session::flash('success', 'تخفیف جدید با موفقیت ایجاد شد.');
        return redirect(route('discounts.index'));
    }


    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return View('admin.discounts.edit', compact('discount'));
    }


    public function update(DiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $data = $request->all();
        if (empty($request->get('code_time')) or !is_numeric($request->get('code_time'))) {
            $data['time'] = 0;
            $data['code_time'] = 0;
        } else {
            $t = time() + $request->get('code_time') * 3600 * 24;
            $data['time'] = $t;
        }
        $discount->update($data);

        Session::flash('success', 'تخفیف با موفقیت ویرایش شد.');
        return redirect(route('discounts.index'));
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        Session::flash('success', 'تخفیف با موفقیت حذف شد.');
        return redirect(route('discounts.index'));
    }

}
