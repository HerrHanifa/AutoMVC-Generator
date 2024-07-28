<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserWebsite;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BackendUserwebsiteController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can:userswebsite-create', ['only' => ['create','store']]);
        //  $this->middleware('can:userswebsite-read',   ['only' => ['show', 'index']]);
        // $this->middleware('can:userswebsite-update',   ['only' => ['edit','update']]);
        // $this->middleware('can:userswebsite-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        // if(!auth()->user()->can('userswebsite-read'))abort(403);
        $userswebsite =  UserWebsite::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('job','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.userWebsite.index',compact('userswebsite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('userswebsite-create'))abort(403);
        return view('admin.userWebsite.create');
    }
    public function updateStatusForAllUsers()
    {
        
 $articles = Article::select('id', 'user_id')->get();

foreach ($articles as $article) {
    // $slug = str_replace(' ', '-', $article->title);
    $article->where('user_id','!=',1)->update(['user_id' => 1]);
    return "yes";
}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
        // if(!auth()->user()->can('userswebsite-create'))abort(403);
        // $request->merge([
        //     'slug'=>\MainHelper::slug($request->slug)
        // ]);
        $request->validate([
            'phone'=>"required|max:14",
            'name'=>"required|max:70",
            // 'title_en'=>"required|max:190",
            'job'=>"required",
            'lastCertification'=>"required|max:10000",
            // "gender"=>"required",
            // "isWantWork"=>"required",
            "typeOfSubscribing"=>"required|",
            "national_id"=>"required|",
        ]);

        // dd($request->all());
        if($request->file('img')){
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $UserWebsite = UserWebsite::create([
                // 'user_id'=>auth()->user()->id,
                "phone"=>$request->phone,
                "name"=>$request->name,
                "job"=>$request->job,
                "national_id"=>$request->national_id,
                "gender"=>$request->gender,
                "lastCertification"=>$request->lastCertification,
                "typeOfSubscribing"=>$request->typeOfSubscribing,
                "isWantWork"=>$request->isWantWork,

                // "removable"=>$request->removable,
                'image'=>$imageName
            ]);

        }
        else{
            $UserWebsite = UserWebsite::create([
                // 'user_id'=>auth()->user()->id,
                "phone"=>$request->input('phone'),
                "name"=>$request->input('name'),
                "job"=>$request->input('job'),
                "national_id"=>$request->input('national_id'),
                "gender"=>$request->input('gender'),
                "lastCertification"=>$request->input('lastCertification'),
                "typeOfSubscribing"=>$request->input('typeOfSubscribing'),
                "isWantWork"=>$request->input('isWantWork'),
                // "removable"=>$request->removable,

            ]);

        }

        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$page,"description");
        if($request->hasFile('image')){
            $image = $page->addMedia($request->image)->toMediaCollection('image');
            $page->update(['image'=>$image->id.'/'.$image->file_name]);
        }

        /*if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/pages/',
                'type'=>'PAGE',
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                'optimize'=>true
            ]);
            $page->update(['image'=>$file['filename']]);
        }*/
        toastr()->success('تم العملية بنجاح','عملية ناجحة');
        return redirect()->route('successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        if(!auth()->user()->can('pages-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page , $id)
    {
        if(!auth()->user()->can('pages-update'))abort(403);
        $editUserWebsite = UserWebsite::find($id);
        return view('admin.userWebsite.editDetailsUserWebsite',compact('page' , 'editUserWebsite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page , $id)
    {
        $UserWebsite = UserWebsite::find($id);
        // if(!auth()->user()->can('pages-read'))abort(403);
        // $request->merge([
        //     'slug'=>\MainHelper::slug($request->slug)
        // ]);
        // $request->validate([
        //     'slug'=>"required|max:190|unique:pages,slug,".$page->id,
        //     'title'=>"required|max:190",
        //     'title_en'=>"required|max:190",
        //     'description'=>"nullable|max:100000",
        //     'meta_description'=>"nullable|max:10000",
        //     "removable"=>"required|in:0,1"
        // ]);


        if($request->img){
            $pathImg = str_replace('\\' , '/' ,public_path('images/')).$UserWebsite->image;
            if(File::exists($pathImg)){
                File::delete($pathImg);
            }
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            DB::table('userswebsite')->where('id' , $id)->update([
                'image' => $imageName
            ]);
            $UserWebsite->phone = $request->phone;
            $UserWebsite->name = $request->name;
            $UserWebsite->job = $request->job;
            $UserWebsite->national_id = $request->national_id;
            $UserWebsite->gender = $request->gender;
            $UserWebsite->lastCertification = $request->lastCertification;
            $UserWebsite->isWantWork = $request->isWantWork;
            $UserWebsite->update();
        }
        else{
            $UserWebsite->phone = $request->phone;
            $UserWebsite->name = $request->name;
            $UserWebsite->job = $request->job;
            $UserWebsite->national_id = $request->national_id;
            $UserWebsite->gender = $request->gender;
            $UserWebsite->lastCertification = $request->lastCertification;
            $UserWebsite->isWantWork = $request->isWantWork;
            $UserWebsite->update();
        }


        $page->update([
            "slug"=>$request->slug,
            "title"=>$request->title,
            // "title_en"=>$request->title_en,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
            "removable"=>$request->removable,
        ]);
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$page,"description");
        if($request->hasFile('image')){
            $image = $page->addMedia($request->image)->toMediaCollection('image');
            $page->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        /*if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/pages/',
                'type'=>'PAGE',
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                'optimize'=>true
            ]);
            $page->update(['image'=>$file['filename']]);
        }*/
        toastr()->success('تم العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, $id)
    {
        $UserWebsite = UserWebsite::find($id);
        $pathImg = str_replace('\\' , '/' ,public_path('images/')).$UserWebsite->image;

        if(File::exists($pathImg)){
            File::delete($pathImg);
        }
        $UserWebsite->delete();

        if($page->removable==1){
            $page->delete();
            toastr()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->info('عفواً الصفحة غير قابلة للحذف','عملية ناجحة');
        }
        return redirect()->route('admin.pages.index');
    }


    // send API pages to front end
    public function PageToFront(){
      $pages=  Page::get();
    //   $setting=Setting::get();
      return view('',compact('pages'));

    }

    public function functionshowDetailsUserWebsite($id){
        $UserWebsite=  UserWebsite::find($id);
        return view('admin.userWebsite.showDetailsUserWebsite',compact('UserWebsite'));
    }

}
