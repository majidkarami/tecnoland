<?php

namespace App\Http\Controllers\Backend;

use App\lib\Jdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function mainPage()
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

        return View('admin.main.index', compact('view','total_view','date_list','view_year','month_year','total'));

    }


}
