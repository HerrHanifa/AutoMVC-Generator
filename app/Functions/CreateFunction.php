<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait CreateFunction
{
    public function create()
    {
        return view('modalName.create');
    }

}
