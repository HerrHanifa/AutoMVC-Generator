<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Testfront;

class TestfrontController extends Controller
{
    public function create()
    {
        return view('testfront.create');
    }
public function edit($id)
    {
        $testfront = Testfront::findOrFail($id);
        return view('testfront.edit',compact('testfront'));
    }
public function index()
    {

        $testfronts= Testfront::get();
        return view('testfront.index',compact('testfronts'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Testfront::create($newItem);
        return redirect(route('testfront.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Testfront::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('testfront.index'));
    }

}