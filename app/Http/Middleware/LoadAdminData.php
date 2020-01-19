<?php

namespace App\Http\Middleware;

use Closure;
use View;
use DB;

class LoadAdminData
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $comment_count = DB::table('comment_product')->where(['status' => 0])->count();
        View::share('comment_count', $comment_count);
        $question_count = DB::table('question')->where(['status' => 0])->count();
        View::share('question_count', $question_count);
        $user_count = DB::table('users')->where(['active' => 1])->count();
        View::share('user_count', $user_count);
        $order_count = DB::table('orders')->where(['pay_status' => 1])->count();
        View::share('order_count', $order_count);
        return $next($request);
    }
}
