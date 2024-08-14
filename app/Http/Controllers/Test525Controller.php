<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test525;

class Test525Controller extends Controller
{
    public function create()
    {
        return view('test525.create');
    }
public function edit($id)
    {
        $test525 = Test525::findOrFail($id);
        return view('test525.edit',compact('test525'));
    }
public function index()
    {

        $test525s= Test525::get();
        return view('test525.index',compact('test525s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test525::create($newItem);
        return redirect(route('test525.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test525::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('test525.index'));
    }

}