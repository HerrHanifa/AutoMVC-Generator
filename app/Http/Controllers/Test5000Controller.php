<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test5000;

class Test5000Controller extends Controller
{
    public function index()
    {

        $test5000s= Test5000::get();
        return view('test5000.index',compact('test5000s'));

}

}