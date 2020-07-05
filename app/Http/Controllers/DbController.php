<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use DB;
use App\Employee;


class DbController extends Controller
{
    public function index()
    {
        //$all = DB::table('employee')->pluck('name','age');
        //$all = DB::table('employee')->select('name')->get();
        //$single = DB::table('employee')->first();
        //$order = DB::table('employee')->orderBy('id','DESC')->limit(2)->get();
        //$count = DB::table('employee')->count();
        //$salary = DB::table('employee')->orderBy('salary','DESC')->offset(0)->limit(1)->get();
        $min = DB::table('employees')->min('salary');

        dd($min);
    }
    public function joining()
    {
        $result = DB::table('order')
                ->join('user','user.id','=','order.user_id')
                ->select('user.name','order.id','order.amount','order.order_date')
                ->get();
                dd($result);
    }
    public function model()
    {
        $result = Employee::all();
        dd($result);
    }
}
