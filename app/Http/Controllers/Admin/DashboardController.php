<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $page_name = 'Dashboard';
        return view('admin.dashboard',compact('page_name'));
    }
}
