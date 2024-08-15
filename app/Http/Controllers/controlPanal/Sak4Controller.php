<?php

namespace App\Http\Controllers\controlPanal;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Sak4;

class Sak4Controller extends Controller
{
    public function create()
    {
        return view('sak4.create');
    }
public function edit($id)
    {
        $sak4 = Sak4::findOrFail($id);
        return view('sak4.edit',compact('sak4'));
    }
public function index()
    {

        $sak4s= Sak4::get();
        return view('sak4.index',compact('sak4s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Sak4::create($newItem);
        return redirect(route('sak4.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Sak4::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('sak4.index'));
    }

}