<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;


class DieErsteErfahrungw1221Controller extends Controller
{
    public function create()
    {
        return view('modalName.create');
    }
public function edit($id)
    {
        $modalName = ModalName::findOrFail($id);
        return view('modalName.edit',compact('modalName'));
    }
public function index()
    {

        $modalNames= ModalName::get();
        return view('modalName.index',compact('modalNames'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        ModalName::create($newItem);
        return redirect(route('modalName.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = ModalName::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('modalName.index'));
    }

}