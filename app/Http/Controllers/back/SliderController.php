<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slide = Slider::latest()->get();
        return view('admin.slider.index', compact('slide'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'pictures' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slide = new Slider() ;
        $slide->text = $request->text ;
        $slide->arabicText = $request->arabicText ;
        if(isset($request->pictures)){
            $imageName = time().'.'.$request->pictures->extension();
            $request->pictures->move(public_path('serImage/'), $imageName);

            $slide->pictures = $imageName;


        }
         $slide->save();



        return redirect()->route('admin.slider.index')->with('success', 'تم اضافة بنجاح');

    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $slide = Slider::find($id);

        return view('admin.slider.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slider::find($id);
        // ## save data
        if(isset($request->pictures)){
            $destination =  str_replace('\\' , '/' , public_path('serImage/')) . $slide->pictures;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $imageName = time().'.'.$request->pictures->extension();
            $request->pictures->move(public_path('serImage/'), $imageName);
            $slide->text = $request->text;
            $slide->arabicText = $request->arabicText ;
            $slide->pictures = $imageName;
            $slide->update();
        }
        else{
            $slide->text = $request->text;
            $slide->arabicText = $request->arabicText ;
            $slide->update();
        }



        return redirect()->route('admin.slider.index')->with('success', 'تم اضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slider::find($id);
        $destination =  str_replace('\\' , '/' , public_path('serImage/')) . $slide->pictures;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $slide->delete();

        return redirect()->route('admin.slider.index')->with('success', 'تم حذف بنجاح');
    }
}
