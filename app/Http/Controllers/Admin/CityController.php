<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\city\StoreRequest;
use App\Http\Requests\city\UpdateRequest;
use App\City;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index(Request $request)
    {
        $cities =City::search($request->all());
        return view('admin.city.index', compact('cities'));
    }


    public function create()
    {
        $provinces = Province::all();
        return view('admin.city.create',compact('provinces'));
    }

    public function store(StoreRequest $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->province_id = $request->province_id;
        $city->save();
//        alert()->success('شهر با موفقیت ایجاد شد.', 'موفقیت');
        return redirect(route('cities.index'));
    }

    public function edit($id)
    {
        $provinces = Province::all();
        $city = City::findOrfail($id);
        return view('admin.city.edit', compact('city','provinces'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $city = City::findOrfail($id);
        $city->name = $request->name;
        $city->province_id = $request->province_id;
        $city->save();
//        alert()->success('شهر با موفقیت ویرایش شد.', 'موفقیت');
        return redirect(route('cities.index'));
    }


    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
//        alert()->success('شهر با موفقیت حذف شد.', 'موفقیت');
        return redirect(route('cities.index'));
    }
}
