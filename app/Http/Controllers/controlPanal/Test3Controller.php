<?php

namespace App\Http\Controllers\controlPanal;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;
use App\Http\Controllers\Controller;


use App\Models\Test3;

class Test3Controller extends Controller
{
    public function create()
    {
        return view('test3.create');
    }
public function edit($id)
    {
        $test3 = Test3::findOrFail($id);
        return view('test3.edit',compact('test3'));
    }
public function index()
    {

        $test3s= Test3::get();
        return view('test3.index',compact('test3s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Test3::create($newItem);
        return redirect(route('test3.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Test3::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('test3.index'));
    }

}