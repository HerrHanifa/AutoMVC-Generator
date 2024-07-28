<?php

namespace App\Http\Controllers\back;


use App\Models\OurSolution;

class OurSolutionController extends BaseBackController
{
    protected $view='our_solution';
    protected $name='الشهادات';
    protected function getModel()
    {
        return new OurSolution();
    }
}
