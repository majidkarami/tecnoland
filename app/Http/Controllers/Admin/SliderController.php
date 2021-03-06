<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use App\Photo;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return View('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return View('admin.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $slider = new Slider();
        if ($request->hasFile('img')) {
            $file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $original_name = $request->file('img')->getClientOriginalName();
            if ($request->file('img')->move('upload/slider/', $file_name)) {
                $slider->img = $file_name;
            }
        }

        $slider->title = $request->post('title');
        $slider->url = 'upload/slider/'.$file_name;
        $slider->img = $original_name;
        $slider->saveOrFail();

        return redirect(route('sliders.index'));

    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return View('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        if ($request->hasFile('img')) {
            $file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $original_name = $request->file('img')->getClientOriginalName();
            if ($request->file('img')->move('upload/slider/', $file_name)) {
                $slider->img = $file_name;
            }
        }

        $slider->title = $request->post('title');
        $slider->url = 'upload/slider/'.$file_name;
        $slider->img = $original_name;
        $slider->saveOrFail();
        return redirect(route('sliders.index'));
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $url = $slider->url;
        $slider->delete();
        if (!empty($url) && file_exists($url)) {
            unlink($url);
        }
        Session::flash('success', 'اسلایدر با موفقیت حذف گردید.');
        return redirect(route('sliders.index'));

    }
}
