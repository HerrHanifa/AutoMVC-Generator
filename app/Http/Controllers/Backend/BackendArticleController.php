<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\Articaltrait;


class BackendArticleController extends Controller
{
    use Articaltrait;
    
    public function __construct()
    {
        $this->middleware('can:articles-create', ['only' => ['create','store']]);
        $this->middleware('can:articles-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:articles-update',   ['only' => ['edit','update']]);
        $this->middleware('can:articles-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        
        $articles =  Article::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->where('post_status','publish')->orderBy('id','DESC')->paginate();

  $articles=$this->get_colection_with_url($articles);

        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
       
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);
        
//         $filename = null;
// if ($request->hasFile('main_image')) {
//     $file = $request->file('main_image');
//     $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
//     $file->move(public_path('main_image'), $filename);
// }

        $request->validate([
            // 'slug'=>"required|max:190|unique:articles,slug",
           
            'is_featured'=>"required|in:0,1",
             'title'=>"required|max:190",
            'description'=>"nullable|max:100000",
            'meta_description'=>"nullable|max:10000",
        ]);
        
            if($request->file('main_image')){
            $image = $request->file('main_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
        
    

        $article = Article::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
            "title_en"=>$request->title_en,
            "description_en"=>$request->description_en,
 "main_image"=>$imageName,
          ]);  }
             else{

        $article = Article::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "title_en"=>$request->title_en,
            "description_en"=>$request->description_en,
            "meta_description"=>$request->meta_description,

     
            ]);
}
//         ]);
   
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$article,"description");
        
        
   
        toastr()->success(__('utils/toastr.article_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $article= Article::find($id);
        $article=$this->get_var_with_url($article);    
        return view('admin.articles.edit',compact('article'));
    }

    public function updateStatusForAllUsers()
    {
        
 $articles = Article::select('id', 'title')->get();

foreach ($articles as $article) {
    $slug = str_replace(' ', '-', $article->title);
    $article->update(['slug' => $slug]);
}
        
        
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);
          $article= Article::find($id);
    
                  if ($request->file('main_image')) {
            // Delete the old image if it exists
            if ($article->main_image) {
                $oldImagePath = public_path('image/'. $article->main_image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
             
                }
            }
            $image = $request->file('main_image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $imagePath = public_path('image/');
            $image->move($imagePath, $imageName);
            
        $article->update([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
            "title_en"=>$request->title_en,
            "description_en"=>$request->description_en,
            "main_image"=>$imageName,
        ]);
    }
    else{
        $article->update([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "title_en"=>$request->title_en,
            "description_en"=>$request->description_en,
            "meta_description"=>$request->meta_description,
           
        ]);
    }
          
          
          
      

     
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$article,"description");
        // if($request->hasFile('main_image')){
        //     $main_image = $article->addMedia($request->main_image)->toMediaCollection('image');
        //     $article->update(['main_image'=>$main_image->id.'/'.$main_image->file_name]);
        // }
        toastr()->success(__('utils/toastr.article_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        toastr()->success(__('utils/toastr.article_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }
}
