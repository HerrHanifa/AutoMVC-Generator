<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;

use App\Models\Test564;

class Test564Controller extends Controller
{
    public function create()
    {
        return view('test564.create');
    }
public function edit($id)
    {
        $test564s = Test564::get()->where('id','=',$id);
        return view('test564.edit',compact('test564s'));
    }
public function index()
    {

        $test564s= Test564::get();
        return view('test564.index',compact('test564s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test564::create($newItem);
        return redirect(route('test564.index'));
    }

}