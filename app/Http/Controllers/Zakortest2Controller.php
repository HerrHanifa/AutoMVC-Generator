<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest2;

class Zakortest2Controller extends Controller
{
    public function create()
    {
        return view('zakortest2.create');
    }
public function edit($id)
    {
        $zakortest2 = Zakortest2::findOrFail($id);
        return view('zakortest2.edit',compact('zakortest2'));
    }
public function index()
    {

        $zakortest2s= Zakortest2::get();
        return view('zakortest2.index',compact('zakortest2s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest2::create($newItem);
        return redirect(route('zakortest2.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest2::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest2.index'));
    }

}