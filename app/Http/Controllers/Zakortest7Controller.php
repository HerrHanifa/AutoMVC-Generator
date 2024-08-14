<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest7;

class Zakortest7Controller extends Controller
{
    public function create()
    {
        return view('zakortest7.create');
    }
public function edit($id)
    {
        $zakortest7 = Zakortest7::findOrFail($id);
        return view('zakortest7.edit',compact('zakortest7'));
    }
public function index()
    {

        $zakortest7s= Zakortest7::get();
        return view('zakortest7.index',compact('zakortest7s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest7::create($newItem);
        return redirect(route('zakortest7.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest7::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest7.index'));
    }

}