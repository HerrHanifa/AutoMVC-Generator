<?php

namespace App\Http\Controllers\controlPanal;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test1;

class Test1Controller extends Controller
{
    public function create()
    {
        return view('test1.create');
    }
public function edit($id)
    {
        $test1 = Test1::findOrFail($id);
        return view('test1.edit',compact('test1'));
    }
public function index()
    {

        $test1s= Test1::get();
        return view('test1.index',compact('test1s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test1::create($newItem);
        return redirect(route('test1.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test1::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('test1.index'));
    }

}