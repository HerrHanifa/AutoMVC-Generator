<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest11;

class Zakortest11Controller extends Controller
{
    public function create()
    {
        return view('zakortest11.create');
    }
public function edit($id)
    {
        $zakortest11 = Zakortest11::findOrFail($id);
        return view('zakortest11.edit',compact('zakortest11'));
    }
public function index()
    {

        $zakortest11s= Zakortest11::get();
        return view('zakortest11.index',compact('zakortest11s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest11::create($newItem);
        return redirect(route('zakortest11.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest11::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest11.index'));
    }

}