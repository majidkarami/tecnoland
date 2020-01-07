<?php

namespace App\Http\Controllers\Admin;

use App\GiftCart;
use App\lib\Jdf;
use App\Http\Requests\GiftCartRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiftCartController extends Controller
{
    public function index(Request $request)
    {
        $gift_cart=GiftCart::with('get_user')->orderBy('id','DESC')->paginate(10);
        return view('admin.gift_carts.index', compact('gift_cart'));
    }

    public function create()
    {
        return view('admin.gift_carts.create', compact('price_list'));
    }

    public function store(GiftCartRequest $request)
    {
        $Jdf=new Jdf();
        $e=explode('/',$request->get('code_time'));
        if(sizeof($e)==3)
        {
            $y=$e[0];
            $m=$e[1];
            $d=$e[2];
            $time=$Jdf->jmktime(23,59,59,$m,$d,$y);

            $t=time();
            $t=substr($t,5,5);
            $code='TecGift'.$request->get('user_id').$t;

            $gift_cart=new GiftCart($request->all());
            $gift_cart->time=$time;
            $gift_cart->code=$code;
            $gift_cart->date=$request->get('code_time');
            $gift_cart->status=0;
            $gift_cart->value2=0;
            $gift_cart->saveOrFail();

            Session::flash('success', 'کارت هدیه جدید با موفقیت ایجاد شد.');
            return redirect(route('gift_cart.index'));
        }
        else
        {
            Session::flash('error', 'متاسفانه مشکلی پیش آمد دوباره تلاش کنید.');
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $gift_cart = GiftCart::findOrFail($id);
        return View('admin.gift_carts.edit', compact('price_list', 'gift_cart'));
    }

    public function update(GiftCartRequest $request, $id)
    {
        $gift_cart=GiftCart::findOrFail($id);
        $data=$request->all();
        $Jdf=new Jdf();
        var_dump($request->get('code_time'));
        $e=explode('/',$request->get('code_time'));
        if(sizeof($e)==3)
        {
            $y=$e[0];
            $m=$e[1];
            $d=$e[2];
            $time=$Jdf->jmktime(23,59,59,$m,$d,$y);
            $data['date']=$request->get('code_time');
            $data['time']=$time;
            $gift_cart->update($data);
            Session::flash('success', 'کارت هدیه با موفقیت ویرایش شد.');
            return redirect(route('gift_cart.index'));
        }
        else
        {
            Session::flash('error', 'متاسفانه مشکلی پیش آمد دوباره تلاش کنید.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $gift_cart=GiftCart::findOrFail($id);
        $gift_cart->delete();
        Session::flash('success', 'کارت هدیه با موفقیت حذف شد.');
        return redirect(route('gift_cart.index'));
    }

}
