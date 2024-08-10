<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Testfinish3;

class Testfinish3Controller extends Controller
{
    public function create()
    {
        return view('testfinish3.create');
    }
public function edit()
    {
        // function body here
    }
public function index()
    {

        $testfinish3s= Testfinish3::get();
        return view('testfinish3.index',compact('testfinish3s'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Testfinish3::create($newItem);
        return redirect(route('testfinish3.index'));
    }
public function update(Request $request)
    {

    }

}