<?php

namespace App\Http\Controllers\Api;


use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsApiController extends BaseApiController
{
    public function index(Request $request)
    {

        $object=$this->getModel()::first();
        if($request->lang=='ar')
        $object['location']= $object['arabicLocation'];
        unset($object['arabicLocation']);
        return response($object);
    }

    public function getModel()
    {

        return new ContactUs();
    }
    protected function arabicSelectedAttributes()
    {

        return ['id','arabicTitle','arabicDescription','arabicLocation','created_at','updated_at'];
    }
    protected function englishSelectedAttributes()
    {

        return ['id','text','description','location','created_at','updated_at'];
    }



}
