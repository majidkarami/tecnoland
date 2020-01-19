<?php

namespace App\Http\Controllers\Admin;

use App\lib\Jdf;
use App\Order;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('admin_login');
    }

    public function index()
    {
        setting('admin_login');
        return View('admin.main.index');
    }

    public function statistic()
    {
        $Jdf = new Jdf();
        $date_list = array();
        $y = $Jdf->tr_num($Jdf->jdate('Y'));
        $m = $Jdf->tr_num($Jdf->jdate('n'));
        $t = $Jdf->tr_num($Jdf->jdate('t'));
        $view = array();
        $total_view = array();
        for ($i = 1; $i <= $t; $i++) {
            $date = $y . '-' . $m . '-' . $i;
            $date_list[$i] = $date;
            $row = DB::table('statistics')->where(['year' => $y, 'month' => $m, 'day' => $i])->first();
            if ($row) {
                $view[$i] = $row->view;
                $total_view[$i] = $row->total_view;
            } else {
                $view[$i] = 0;
                $total_view[$i] = 0;
            }
        }

        $view_year = DB::table('statistics')->where(['year' => $y])->sum('total_view');
        $month_year = DB::table('statistics')->where(['year' => $y, 'month' => $m])->sum('total_view');
        $total = DB::table('statistics')->sum('total_view');
        return View('admin.main.statistic', compact('view', 'total_view', 'date_list', 'view_year', 'month_year', 'total'));

    }

    public function income()
    {
        $Jdf = new Jdf();
        $y = $Jdf->tr_num($Jdf->jdate('Y'));
        $m = $Jdf->tr_num($Jdf->jdate('n'));
        $t = $Jdf->tr_num($Jdf->jdate('t'));
        $date_list = array();
        $total_price = array();
        $order_count = array();
        for ($i = 1; $i <= $t; $i++) {
            $date = $y . '-' . $m . '-' . $i;
            $date_list[$i] = $date;
            $total_price[$i] = Order::where(['date' => $date, 'pay_status' => 1])->sum('price');
            $order_count[$i] = Order::where(['date' => $date, 'pay_status' => 1])->count();
        }
        return View('admin.main.income', compact('total_price', 'order_count', 'date_list'));
    }

    public function admin_login()
    {
        return View('admin.auth.login');
    }
}
