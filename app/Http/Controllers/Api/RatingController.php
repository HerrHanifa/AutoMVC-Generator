<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \App\Functions\IndexFunction;

use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {

        $ratings= Rating::get();
        return view('rating.index',compact('ratings'));

}

}