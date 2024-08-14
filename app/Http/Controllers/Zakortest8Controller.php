<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest8;

class Zakortest8Controller extends Controller
{
    public function create()
    {
        return view('zakortest8.create');
    }
public function edit($id)
    {
        $zakortest8 = Zakortest8::findOrFail($id);
        return view('zakortest8.edit',compact('zakortest8'));
    }
public function index()
    {

        $zakortest8s= Zakortest8::get();
        return view('zakortest8.index',compact('zakortest8s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest8::create($newItem);
        return redirect(route('zakortest8.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest8::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest8.index'));
    }

}