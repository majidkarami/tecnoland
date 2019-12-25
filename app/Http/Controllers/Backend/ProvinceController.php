<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\province\StoreRequest;
use App\Http\Requests\province\UpdateRequest;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{

    public function index(Request $request)
    {
        $provinces = Province::search($request->all());
        return view('admin.provinces.index', compact('provinces'));

    }


    public function create()
    {
        return view('admin.provinces.create');
    }

    public function store(StoreRequest $request)
    {
        $province = new Province();
        $province->name = $request->name;
        $province->save();
//        alert()->success('استان با موفقیت ایجاد شد.', 'موفقیت');
        return redirect(route('provinces.index'));
    }

    public function edit($id)
    {
        $province = Province::findOrfail($id);
        return view('admin.provinces.edit', compact('province'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $province = Province::findOrfail($id);
        $province->name = $request->name;
        $province->save();
//        alert()->success('استان با موفقیت ویرایش شد.', 'موفقیت');
        return redirect(route('provinces.index'));
    }


    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        $province->cities()->delete();
        $province->delete();
//        alert()->success('استان با موفقیت حذف شد.', 'موفقیت');
        return redirect(route('provinces.index'));
    }
}
