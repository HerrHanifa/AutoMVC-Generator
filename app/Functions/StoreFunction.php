<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait StoreFunction
{
    public function store(Request $request)
    {
        $newItem = $request->all();
        ModalName::create($newItem);
        return redirect(route('modalName.index'));
    }

}
