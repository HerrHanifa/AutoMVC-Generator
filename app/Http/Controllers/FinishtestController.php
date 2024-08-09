<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Finishtest;

class FinishtestController extends Controller
{
    public function index()
    {

        $finishtests= Finishtest::get();
        return view('finishtest.index',compact('finishtests'));

}

}
