<?php

namespace App\Http\Controllers\Backend;

use App\Amazing;
use App\Http\Requests\amazing\AmazingRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmazingController extends Controller
{
    public function index()
    {
        $amazings = Amazing::orderby('id', 'DESC')->paginate(10);
        return View('admin.amazings.index', compact('amazings'));
    }

    public function create()
    {
        $products = Product::pluck('title','id')->all();
        return View('admin.amazings.create',compact('products'));
    }

    public function store(AmazingRequest $request)
    {
        $amazing = new Amazing($request->all());
        $amazing->timestamp = time() + $request->get('time') * 60 * 60;
        $amazing->saveOrFail();

        return redirect(route('amazings.index'));
    }

    public function edit($id)
    {
        $products = Product::pluck('title','id')->all();
        $amazing = Amazing::findOrFail($id);
        return view('admin.amazings.edit', compact('amazing','products'));
    }

    public function update(AmazingRequest $request, $id)
    {
        $amazing = Amazing::findOrFail($id);
        $time = $request->get('time');
        if ($time != $amazing->time) {
            $amazing->timestamp = time() + $time * 60 * 60;
        }
        $amazing->update($request->all());
        return redirect(route('amazings.index'));
    }

    public function destroy($id)
    {
        $amazing = Amazing::findOrFail($id);
        $amazing->delete();
        return redirect()->back();
    }
}
