<?php

namespace App\Http\Controllers\Backend\frontEndController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use App\Models\UserWebsite;
use App\Models\ContactUs;
use App\Models\OurSolution;
use App\Models\Client;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\AboutUs;

class ApiController extends Controller
{

    // das ist für Api

    public function Asio()
    {


        $setting = Setting::select('key','id','value')->whereIn('id',[1,2,8,27,34])->get();




        return response()->json($setting);

    }
public function Aservice()
    {

        $services = Service::get();

        foreach($services as $serv)
        {
            $imagePath= '/serImage/'.$serv->icons;
            $serv->icons =url($imagePath);
        }

        return response()->json($services);

    }

    public function Acontact()
    {
        $contact = ContactUs::first();
        return response()->json($contact);

    }

    public function Aabout()
    {
        $about = AboutUs::first();
        return response()->json($about);

    }
    public function Aproject()
    {
        $project = OurSolution::get();

        foreach($project as $proj)
        {
            $imagePath= '/projectsImage/'.$proj->icons; // افترض أن projectsImage هو الحقل الذي يحتوي على عنوان URL للصورة
            $proj->icons =url($imagePath);
        }

        return response()->json($project);
       }



    public function Aslide()
    {
        $slide = Slider::first();
        if ($slide->pictures) {
            $imagePath = '/uploading/'.$slide->pictures;
            $slide->pictures = url($imagePath);
        }

           return response()->json($slide);

    }
################################################## End Api ########################################################
    public function about()
    {
        $sites = ContactUs::first();
        $about = AboutUs::first();
        return view('Frontend.SiteExcellent.about' , compact('about','sites'));
    }

    public function services()
    {
        $sites = ContactUs::first();
        $services = Service::get();
        return view('Frontend.SiteExcellent.services' , compact('sites','services'));
    }

    public function ourSolution()
    {
        $sites = ContactUs::first();
        $solution = OurSolution::get();
        return view('Frontend.SiteExcellent.solution', compact('solution','sites'));
    }

    public function ourClients()
    {
        $sites = ContactUs::first();
        $clients = Client::get();

    }

    public function contactUs()
    {
        $sites = ContactUs::first();
        return view('Frontend.SiteExcellent.contact_us', compact('sites'));
    }

    public function ajaxTypeAnimate(Request $request){
        $text = Slider::select('text')->first();

        return response()->json(['text' => $text]);
    }





    // public function index()
    // {
    //   $pages=Page::get();
    //     $Articles=  Article::latest()->limit(4)->get();

    //    return view('Frontend.index',compact('pages','Articles'));
    // }
    public function form_record()
   {
    return view('Frontend.form_record');
   }
       public function successfully()
   {
    return view('Frontend.successfully');
   }


   public function cahngePage($slug){
      $page=Page::with('articles')->where('slug',$slug)->first();
    //   dd($page);
      // f
      // $page->articles();
      // $articles=Page::with('articles')->where('slug',$slug)->first();
//  return $page->articles;
      return view('Frontend.about_epra',compact('page' , 'slug'));
   }

   public function goArticel($slug)
   {

    $Article=  Article::where('slug',$slug)->first();
      return view('Frontend.article',compact('Article' , 'slug'));
   }

   public function contuct(){
      return view('Frontend.contact_us');
   }
   public function show($id,$name){
       $details = UserWebsite::where('name' , $name)->where('id' , $id)->first();
       return view('Frontend.details' , compact('details'));
   }
}
