<?php

namespace App\Http\Controllers\Api;


use App\Models\OurSolution;

class OurSolutionApiController extends BaseApiController
{
    public function getModel()
    {

        return new OurSolution();
    }



}
