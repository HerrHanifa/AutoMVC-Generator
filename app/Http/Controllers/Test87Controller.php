<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;

use App\Models\Test87;

class Test87Controller extends Controller
{
    public function create()
    {
        return view('test87.create');
    }
public function index()
    {

        $test87s= Test87::get();
        return view('test87.index',compact('test87s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test87::create($newItem);
        return redirect(route('test87.index'));
    }

}
