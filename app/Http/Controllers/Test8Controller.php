<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;

use App\Models\Test8;

class Test8Controller extends Controller
{
    public function create(Request $request)
    {
        return view('test8.create');
    }
public function index()
    {

        $test8s= Test8::get();
        return view('test8.index',compact('test8s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test8::create($newItem);
        return redirect('test8.index');
    }

}
