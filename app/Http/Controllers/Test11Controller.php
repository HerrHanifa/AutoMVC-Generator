<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test11;

class Test11Controller extends Controller
{
    public function index()
    {
     
        $test11s= Test11::get();
        return view('test11.index',compact('test11s'));

}

}