<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticalApiController extends BaseApiController
{
    public function index(Request $request)
    {

        if ($request->lang =='ar') {
            $object=$this->getModel()::select($this->arabicSelectedAttributes())->latest()->first();
            return $object;
                $object['title_en']=  $object['title'];
                $object['description_en']=  $object['description'];
                unset( $object['title']);
                unset( $object['description']);
            }
            elseif ($request->lang =='en') {
                $object=$this->getModel()::select($this->englishSelectedAttributes())->latest()->first();
                return $object;
            }


        return response($object);
        
    }

    public function getModel()
    {
    return new Article();
    }
    protected function arabicSelectedAttributes()
    {
        return ['id','title','description','meta_description','slug','main_image','created_at','updated_at'];
    }
    protected function englishSelectedAttributes()
    {

        return ['id','title_en','description_en','meta_description','slug','main_image','created_at','updated_at'];
    }



}
