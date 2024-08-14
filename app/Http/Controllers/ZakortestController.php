<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\ShowFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Zakortest;

class ZakortestController extends Controller
{
    public function create()
    {
        return view('zakortest.create');
    }
public function edit($id)
    {
        $zakortest = Zakortest::findOrFail($id);
        return view('zakortest.edit',compact('zakortest'));
    }
public function index()
    {

        $zakortests= Zakortest::get();
        return view('zakortest.index',compact('zakortests'));

}
public function show($id)
    {
        // function body here
    }
public function store(Request $request)
    {
        $newItem = $request->all();
        Zakortest::create($newItem);
        return redirect(route('zakortest.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Zakortest::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('zakortest.index'));
    }

}