<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest12;

class Zakortest12Controller extends Controller
{
    public function create()
    {
        return view('zakortest12.create');
    }
public function edit($id)
    {
        $zakortest12 = Zakortest12::findOrFail($id);
        return view('zakortest12.edit',compact('zakortest12'));
    }
public function index()
    {

        $zakortest12s= Zakortest12::get();
        return view('zakortest12.index',compact('zakortest12s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest12::create($newItem);
        return redirect(route('zakortest12.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest12::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest12.index'));
    }

}