<?php

namespace App\Http\Controllers\Api;



use App\Models\Slider;
use App\Models\Setting;
use Illuminate\Http\Request;

class SliderApiController extends BaseApiController
{
    public function index(Request $request)
    {

        $object=$this->getModel()::first();
        if($request->lang=='ar'){
        $object['text']= $object['arabicText'];

      }
        unset($object['arabicText']);
        $wEnglish=Setting::where('key','EnglishPr')->first();
      
        $object['wEnglish'] = $wEnglish->value;

        return response($object);
    }

    public function getModel()
    {

        return new Slider();
    }



}
