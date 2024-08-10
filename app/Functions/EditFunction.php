<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait EditFunction
{
    public function edit($id)
    {
        $modalNames = ModalName::get()->where('id','=',$id);
        return view('modalName.edit',compact('modalNames'));
    }

}
