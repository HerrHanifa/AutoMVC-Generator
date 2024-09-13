<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Headercode;

class HeadercodeController extends Controller
{
    public function index()
    {

        $headercodes= Headercode::get();
        return view('headercode.index',compact('headercodes'));

}

}