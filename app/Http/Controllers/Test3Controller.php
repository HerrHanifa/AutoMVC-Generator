<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test3;

class Test3Controller extends Controller
{
    public function index()
    {
     
        $test3s= Test3::get();
        return view('test3.index',compact('test3s'));

}

}