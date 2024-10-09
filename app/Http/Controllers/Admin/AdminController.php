<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct(){

    }
    public function index(){
        $todayOrder = Order::whereDay('created_at', '=', Carbon::today())->get();
        $yestardayOrder = Order::whereDay('created_at', '=', Carbon::yesterday())->get();
        $mounthOrder = Order::whereMonth('created_at', '=', Carbon::now()->month)->get();
        $yearOrder = Order::whereYear('created_at', '=', Carbon::now()->year)->get();

        return view('admin.index')->with([
            $todayOrder,
            $yestardayOrder,
            $mounthOrder,
            $yearOrder,
        ]);
    }
}
