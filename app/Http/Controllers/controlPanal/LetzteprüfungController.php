<?php

namespace App\Http\Controllers\controlPanal;

use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Letzteprüfung;

class LetzteprüfungController extends Controller
{
    public function create()
    {
        return view('letzteprüfung.create');
    }
public function edit($id)
    {
        $letzteprüfung = Letzteprüfung::findOrFail($id);
        return view('letzteprüfung.edit',compact('letzteprüfung'));
    }
public function index()
    {

        $letzteprüfungs= Letzteprüfung::get();
        return view('letzteprüfung.index',compact('letzteprüfungs'));

}
public function store(Request $request)
    {
        $newItem = $request->all();
        Letzteprüfung::create($newItem);
        return redirect(route('letzteprüfung.index'));
    }
public function update(Request $request , $id)
    {
        $updateItem = Letzteprüfung::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('letzteprüfung.index'));
    }

}