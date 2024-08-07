<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test1;

class Test1Controller extends Controller
{
    public function index()
    {
     
        $test1s= Test1::get();
        return view('test1.index',compact('test1s'));

}

}