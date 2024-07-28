<?php

namespace App\Http\Controllers\back;


use App\Models\Card;

class CardsController extends BaseBackController
{
    protected $view='cards';
    protected $name='البطاقات التعريفية';
    protected function getModel()
    {
        return new Card();
    }
}
