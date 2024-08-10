<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\IndexFunction;

use App\Models\Test100;

class Test100Controller extends Controller
{
    public function create(Request $request)
    {
        // function body here
    }
public function index()
    {

        $test100s= Test100::get();
        return view('test100.index',compact('test100s'));

}

}