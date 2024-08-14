<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest4;

class Zakortest4Controller extends Controller
{
    public function create()
    {
        return view('zakortest4.create');
    }
public function edit($id)
    {
        $zakortest4 = Zakortest4::findOrFail($id);
        return view('zakortest4.edit',compact('zakortest4'));
    }
public function index()
    {

        $zakortest4s= Zakortest4::get();
        return view('zakortest4.index',compact('zakortest4s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest4::create($newItem);
        return redirect(route('zakortest4.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest4::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest4.index'));
    }

}