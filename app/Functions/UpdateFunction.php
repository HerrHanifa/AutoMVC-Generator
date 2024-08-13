<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait UpdateFunction
{
    public function update(Request $request , $id)
    {
        $updateItem = ModalName::where('id','=',$id);
        $updateItem->update($request->all());
        return redirect(route('modalName.index'));
    }

}
