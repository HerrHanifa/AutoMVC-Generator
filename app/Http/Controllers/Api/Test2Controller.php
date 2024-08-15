<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test2;

class Test2Controller extends Controller
{
    public function create()
    {
        return view('test2.create');
    }
public function edit($id)
    {
        $test2 = Test2::findOrFail($id);
        return view('test2.edit',compact('test2'));
    }
public function index()
    {

        $test2s= Test2::get();
        return view('test2.index',compact('test2s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test2::create($newItem);
        return redirect(route('test2.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test2::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('test2.index'));
    }

}