<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Sak5;

class Sak5Controller extends Controller
{
    public function create()
    {
        return view('sak5.create');
    }
public function edit($id)
    {
        $sak5 = Sak5::findOrFail($id);
        return view('sak5.edit',compact('sak5'));
    }
public function index()
    {

        $sak5s= Sak5::get();
        return view('sak5.index',compact('sak5s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Sak5::create($newItem);
        return redirect(route('sak5.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Sak5::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('sak5.index'));
    }

}