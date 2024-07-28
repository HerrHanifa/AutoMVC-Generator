<?php

namespace App\Http\Controllers\Backend\frontEndController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use DB;

class indexController extends Controller
{
    public function index()
    {
      $pages=Page::get();
       return view('Frontend.index',compact('pages'));
    }
    public function form_record()
   {
    return view('Frontend.form_record');
   }

   public function cahngePage($slug){
      $page=Page::with('articles')->where('slug',$slug)->first();
      // f
      // $page->articles();
      // $articles=Page::with('articles')->where('slug',$slug)->first();
//  return $page->articles;
      return view('Frontend.about_epra',compact('page'));
   }

   public function goArticel($slug)
   {

    $Article=  Article::where('slug',$slug)->first();
      return view('Frontend.viewArtical',compact('Article'));
   }


   public function contuct(){
      return view('Frontend.contact_us');
   }
}
