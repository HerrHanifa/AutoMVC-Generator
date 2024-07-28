<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\File;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact = ContactUs::latest()->get();
        return view('admin.contact-us.index', compact('contact'));
    }


    public function create()
    {
        return view('admin.contact-us.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'maps' => 'required',
            'fax' => 'required',
            'phone' => 'required',
            'email' => 'required',
            // 'whatsapp' => 'required',
            // 'facebook' => 'required',
            // 'instagram' => 'required',
            // 'twitter' => 'required',
            // 'linkedin' => 'required',
        ]);

        $contact = new ContactUs();
        $contact->maps = $request->maps;
        $contact->fax = $request->fax;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->whatsapp = $request->whatsapp;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;
        $contact->linkedin = $request->linkedin;
        $contact->save();


        return redirect()->route('admin.contact_us.index')->with('success', 'تم اضافة بنجاح');

    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $contact = ContactUs::find($id);

        return view('admin.contact-us.edit', compact('contact'));
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
        $contact = ContactUs::find($id);
        // ## save data
        $contact->maps = $request->maps;
        $contact->fax = $request->fax;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->whatsapp = $request->whatsapp;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;
        $contact->linkedin = $request->linkedin;
        $contact->arabicLocation = $request->arabicLocation;
        $contact->location = $request->location;
        $contact->update();


        return redirect()->route('admin.contact_us.index')->with('success', 'تم اضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactUs::find($id);
        $contact->delete();

        return redirect()->route('admin.contact_us.index')->with('success', 'تم حذف بنجاح');
    }
}
