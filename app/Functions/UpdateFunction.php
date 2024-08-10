<?php

namespace App\Functions;

use Illuminate\Support\Facades\Request;

trait UpdateFunction
{
    public function update(Request $request)
    {
        $updateItem = $request->all();
        ModalName::update($updateItem);
        return redirect(route('modalName.index'));
    }

}
