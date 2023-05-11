<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin(){
        $user = Auth::user();
        $countMember = DB::table('member') -> get() -> count();
        $countProduct = DB::table('product') -> get() -> count();
        $countOrder = DB::table('order') -> where('status','In Process') -> get() -> count();
        $income = DB::table('order') -> where('status', 'Delivered') -> sum('price');
        return view('admin.dashboard.index', ['income' => $income,'countOrder' => $countOrder, 'user' => $user, 'countMember' => $countMember, 'countProduct' => $countProduct]);
    }

}