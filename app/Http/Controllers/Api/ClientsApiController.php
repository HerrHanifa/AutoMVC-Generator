<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;

class ClientsApiController extends BaseApiController
{
    public function getModel()
    {

        return new Client();
    }
   
}
