<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait IndexFunction
{
    public function index()
    {

        $modalNames= ModalName::get();
        return view('modalName.index',compact('modalNames'));

}
}
