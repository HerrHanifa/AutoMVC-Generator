<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\IndexFunction;

use App\Models\Lkemgnfsld;

class LkemgnfsldController extends Controller
{
    public function index()
    {
     
        $lkemgnfslds= Lkemgnfsld::get();
        return view('lkemgnfsld.index',compact('lkemgnfslds'));

}

}