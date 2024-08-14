<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait EditFunction
{
    public function edit($id)
    {
        $modalName = ModalName::findOrFail($id);
        return view('modalName.edit',compact('modalName'));
    }

}
