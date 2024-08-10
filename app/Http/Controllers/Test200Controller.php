<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test200;

class Test200Controller extends Controller
{
    public function create()
    {
        return view('test200.create');
    }
public function edit($id)
    {
        $test200s = Test200::get()->where('id','=',$id);
        return view('test200.edit',compact('test200s'));
    }
public function index()
    {

        $test200s= Test200::get();
        return view('test200.index',compact('test200s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test200::create($newItem);
        return redirect(route('test200.index'));
    }
public function update(Request $request)
    {
        $updateItem = $request->all();
        Test200::update($updateItem);
        return redirect(route('test200.index'));
    }

}