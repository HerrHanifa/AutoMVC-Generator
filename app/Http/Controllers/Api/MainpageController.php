<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \App\Functions\IndexFunction;

use App\Models\Mainpage;

class MainpageController extends Controller
{
    public function index()
    {

        $mainpages= Mainpage::get();
        return view('mainpage.index',compact('mainpages'));

}

}