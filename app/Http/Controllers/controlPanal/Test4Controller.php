<?php

namespace App\Http\Controllers\controlPanal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Test4;

class Test4Controller extends Controller
{
    public function create()
    {
        return view('test4.create');
    }
public function edit($id)
    {
        $test4 = Test4::findOrFail($id);
        return view('test4.edit',compact('test4'));
    }
public function index()
    {

        $test4s= Test4::get();
        return view('test4.index',compact('test4s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test4::create($newItem);
        return redirect(route('test4.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test4::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('test4.index'));
    }

}