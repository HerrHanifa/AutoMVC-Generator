<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsApiController extends BaseApiController
{
    public function index(Request $request)
    {

        if ($request->lang =='ar') {
            $object=$this->getModel()::select($this->arabicSelectedAttributes())->latest()->first();
                $object['title']=  $object['arabicTitle'];
                $object['description']=  $object['arabicDescription'];
                unset( $object['arabicTitle']);
                unset( $object['arabicDescription']);
            }
            elseif ($request->lang =='en') {
                $object=$this->getModel()::select($this->englishSelectedAttributes())->latest()->first();

            }


        return response($object);
        
    }

    public function getModel()
    {
    return new AboutUs();
    }
    protected function arabicSelectedAttributes()
    {
        return ['id','title_ar','description1_ar','description2_ar','created_at','updated_at'];
    }
    protected function englishSelectedAttributes()
    {

        return ['id','title_en','description1_en','description2_en','created_at','updated_at'];
    }



}
