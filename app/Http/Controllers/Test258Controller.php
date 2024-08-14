<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test258;

class Test258Controller extends Controller
{
    public function create()
    {
        return view('test258.create');
    }
public function edit($id)
    {
        $test258 = Test258::findOrFail($id);

        return view('test258.edit',compact('test258'));
    }
public function index()
    {

        $test258s= Test258::get();
        return view('test258.index',compact('test258s'));

}
public function store(Request $request )
    {
        $newItem = $request->all();
        Test258::create($newItem);
        return redirect(route('test258.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test258::findOrFail($id);;
        $updateItem->update($request->all());
        return redirect(route('test258.index'));
    }

}
