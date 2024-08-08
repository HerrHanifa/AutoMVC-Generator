<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Test1;
use Illuminate\Support\Facades\DB;

class Test1Controller extends Controller
{
    public function index()
    {

        // $test1s= Test1::get();
        $test1s = DB::select('select * from test1');
        // dd($test1s);
        return view('test1.index',compact('test1s'));

}

}
