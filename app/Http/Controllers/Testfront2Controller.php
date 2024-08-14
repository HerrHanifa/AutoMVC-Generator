<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Testfront2;

class Testfront2Controller extends Controller
{
    public function create()
    {
        return view('testfront2.create');
    }
public function edit($id)
    {
        $testfront2 = Testfront2::findOrFail($id);
        return view('testfront2.edit',compact('testfront2'));
    }
public function index()
    {

        $testfront2s= Testfront2::get();
        return view('testfront2.index',compact('testfront2s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Testfront2::create($newItem);
        return redirect(route('testfront2.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Testfront2::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('testfront2.index'));
    }

}