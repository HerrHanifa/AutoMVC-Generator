<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test4;

class Test4Controller extends Controller
{
    public function index()
    {
     
        $test4s= Test4::get();
        return view('test4.index',compact('test4s'));

}

}