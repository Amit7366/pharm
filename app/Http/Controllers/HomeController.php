<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 2){

            $count =DB::table('stocks')
                ->where('total','!=',0)
                ->sum('total');

            $sales =DB::table('sales')
                ->where('total','!=',0)
                ->sum('total');

            $balance_due =DB::table('sales')
                ->where('balance_due','!=',0)
                ->sum('balance_due');
            return view('auth.dashboards.users.dashboard',compact('count','sales','balance_due'));
        }elseif (Auth::user()->role ==1){
            return view('auth.dashboards.admins.index');
        }

    }

}
