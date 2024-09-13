<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \App\Functions\IndexFunction;

use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {

        $partners= Partner::get();
        return view('partner.index',compact('partners'));

}

}