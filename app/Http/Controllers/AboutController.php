<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function about()
    {
        $first_name='M.S.';
        $last_name='Dhoni';
        //return view('about',['first_name'=>'M.S.','last_name'=>'Dhoni']);
        return view('front.layout.master');
    }
}
