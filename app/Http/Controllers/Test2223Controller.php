<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test2223;

class Test2223Controller extends Controller
{
    public function index()
    {

        $test2223s= Test2223::get();
        return view('test2223.index',compact('test2223s'));

}

}