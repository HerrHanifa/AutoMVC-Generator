<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;

class CardsApiController extends BaseApiController
{
    public function getModel()
    {

        return new Card();
    }
    protected function arabicSelectedAttributes()
    {

        return ['id','arabicTitle','arabicDescription','created_at','updated_at'];
    }
    protected function englishSelectedAttributes()
    {

        return ['id','title','description','created_at','updated_at'];
    }



}
