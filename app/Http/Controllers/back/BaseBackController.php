<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

abstract class BaseBackController extends Controller
{
    protected $view;
    protected $name;
    abstract protected function getModel();

    public function index()
    {
        $objects = $this->getModel()::latest()->get();
        
        $name=$this->name;
        return view('admin.'.$this->view.'.index', compact('objects','name'));
    }


    public function create()
    {
        return view('admin.'.$this->view.'.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if(isset($request->icons)){
            $imageName = time().'.'.$request->icons->extension();
            $request->icons->move(public_path('serImage/'), $imageName);
            $data['icons'] = $imageName;

        }
        $this->getModel()::create($data);


        return redirect()->route('admin.'.$this->view.'.index')->with('success', 'تم اضافة بنجاح');

    }




    public function edit($id)
    {
        $object = $this->getModel()::find($id);

        return view('admin.'.$this->view.'.edit', compact('object'));
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

        $data=$request->all();
        $object=  $this->getModel()::find($id);
        if(isset($request->icons)){
            $destination =  str_replace('\\' , '/' , public_path('serImage/')) . $object->icons;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $imageName = time().'.'.$request->icons->extension();
            $request->icons->move(public_path('serImage/'), $imageName);
            $data['icons'] = $imageName;

        }
        $object->update($data);
        return redirect()->route('admin.'.$this->view.'.index')->with('success', 'تم اضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = $this->getModel()::find($id);

        $destination =  str_replace('\\' , '/' , public_path('serImage/')) . $object->icons;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $object->delete();

        return redirect()->route('admin.'.$this->view.'.index')->with('success', 'تم حذف بنجاح');
    }

    protected function rules():array
    {

        return [
            'icons' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => '',
            'position' => '',
            'arabicTitle' => 'required|string',
            'arabicPosition' => 'required|string'

        ];

    }

}
