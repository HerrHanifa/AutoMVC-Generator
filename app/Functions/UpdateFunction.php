<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait UpdateFunction
{
    public function update(Request $request , $id)
    {
        $updateItem = ModalName::findOrFail($id);
        $updateItem->update($request->all());
        return redirect(route('modalName.index'));
    }

}
