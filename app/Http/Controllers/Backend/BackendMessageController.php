<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Communicate;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class BackendMessageController extends Controller
{




    public function index()
    {

        $messages =  Communicate::latest()->get();
        Communicate::where('seen',0)->update(['seen'=>1]);
        return view('admin.messages.index',compact('messages'));

    }

    public function show(int $id)
    {
        $message= Communicate::find($id);
        return view('admin.messages.show',compact('message'));
    }





    public function destroy(int $id)
    {
        $communicate= Communicate::find($id);
        $communicate->delete();
        toastr()->success('تم حذف الرسالة بنجاح','عملية ناجحة');
        return redirect()->route('admin.messages.index');
    }


}
