<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseApiController extends Controller
{
    abstract protected function getModel();

     public function index(Request $request)
    {
        if ($request->lang =='ar') {
            $objects=$this->getModel()::select($this->arabicSelectedAttributes())
            ->latest()->get();
            foreach ($objects as &$object) {
                $object['title']=  $object['arabicTitle'];
                $object['description']=  $object['arabicDescription'];
                unset( $object['arabicTitle']);
                unset( $object['arabicDescription']);
            }

            }
            elseif ($request->lang =='en') {
                $objects=$this->getModel()::select($this->englishSelectedAttributes())->get();
            }


        return response($objects);
    }
    protected function arabicSelectedAttributes()
    {

        return ['id','icons','arabicTitle','arabicDescription','created_at','updated_at'];
    }
    protected function englishSelectedAttributes()
    {

        return ['id','icons','title','description','created_at','updated_at'];
    }



}
