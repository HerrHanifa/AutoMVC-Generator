<?php

namespace App\Http\Controllers\controlPanal;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use \App\Functions\DeleteFunction;
use \App\Functions\IndexFunction;

use App\Models\Message;

class MessagesController extends Controller
{
        public function delete($id)
    {
        // العثور على العنصر باستخدام الـ ID
        $item = Message::findOrFail($id);

        // الحصول على أعمدة الملفات
        $fileColumns = $item->fileColumns();

        if ($fileColumns) {
            foreach ($fileColumns as $column) {
                // الحصول على المسار الكامل للملف في مجلد public
                $filePath = public_path($item->$column);

                // التحقق من وجود الملف ثم حذفه
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        }

        // حذف السجل من قاعدة البيانات
        $item->delete();

        // إعادة التوجيه إلى صفحة العرض مع رسالة نجاح
        return redirect()->route('message.index.web')
                         ->with('success', 'Item deleted successfully!');
    }

    public function index()
    {

        $messages= Message::get();
        return view('message.index',compact('messages'));

}


}