<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\IndexFunction;

use App\Models\Test55;

class Test55Controller extends Controller
{
    public function create(Request $request)
    {
        // function body here
    }
public function index()
    {

        $test55s= Test55::get();
        return view('test55.index',compact('test55s'));

}

}