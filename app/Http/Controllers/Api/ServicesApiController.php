<?php

namespace App\Http\Controllers\Api;


use App\Models\Service;


class ServicesApiController extends BaseApiController
{

    public function getModel()
    {

        return new Service();
    }

}
