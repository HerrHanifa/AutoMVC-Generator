<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest3;

class Zakortest3Controller extends Controller
{
    public function create()
    {
        return view('zakortest3.create');
    }
public function edit($id)
    {
        $zakortest3 = Zakortest3::findOrFail($id);
        return view('zakortest3.edit',compact('zakortest3'));
    }
public function index()
    {

        $zakortest3s= Zakortest3::get();
        return view('zakortest3.index',compact('zakortest3s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest3::create($newItem);
        return redirect(route('zakortest3.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest3::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest3.index'));
    }

}