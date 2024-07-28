<?php

namespace App\Http\Controllers\back;


use App\Models\Client;

class ClientsController extends BaseBackController
{
    protected $view='clients';
    protected $name='الأساتذة';
    protected function getModel()
    {
        return new Client();
    }
    
}
