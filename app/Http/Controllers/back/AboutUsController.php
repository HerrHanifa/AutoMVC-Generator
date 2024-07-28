<?php

namespace App\Http\Controllers\back;


use App\Models\AboutUs;


class AboutUsController extends BaseBackController
{

    protected $view='aboutus';
    protected $name='حولنا';
    protected function getModel()
    {
        return new AboutUs();
    }
}
