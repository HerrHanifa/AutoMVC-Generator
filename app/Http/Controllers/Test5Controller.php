<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test5;

class Test5Controller extends Controller
{
    public function index()
    {

        $test5s= Test5::get();
        return view('test5.index',compact('test5s'));

}

}