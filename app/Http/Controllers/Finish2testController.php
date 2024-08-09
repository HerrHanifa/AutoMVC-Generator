<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Finish2test;

class Finish2testController extends Controller
{
    public function index()
    {

        $finish2tests= Finish2test::get();
        return view('finish2test.index',compact('finish2tests'));

}

}