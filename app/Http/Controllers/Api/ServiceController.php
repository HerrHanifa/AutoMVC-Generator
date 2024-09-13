<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \App\Functions\IndexFunction;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {

        $services= Service::get();
        return view('service.index',compact('services'));

}

}