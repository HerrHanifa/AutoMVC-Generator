<?php

namespace App\Http\Controllers\back;


use App\Models\Service;


class ServicesController extends BaseBackController
{

    protected $view='services';
    protected $name='الخدمات';
    protected function getModel()
    {
        return new Service();
    }
}
