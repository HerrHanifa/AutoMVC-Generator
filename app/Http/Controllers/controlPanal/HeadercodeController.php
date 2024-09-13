<?php

namespace App\Http\Controllers\controlPanal;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use \App\Functions\CreateFunction;
use \App\Functions\DeleteFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;
use Illuminate\Support\Facades\File;
use App\Models\Headercode;

class HeadercodeController extends Controller
{
        public function create()
    {
        return view('headercode.create');
    }

    public function delete($id)
    {
        // العثور على العنصر باستخدام الـ ID
        $item = Headercode::findOrFail($id);

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
        return redirect()->route('headercode.index.web')
                         ->with('success', 'Item deleted successfully!');
    }

    public function edit($id)
    {
        $headercode = Headercode::findOrFail($id);
        return view('headercode.edit',compact('headercode'));
    }

    public function index()
    {

        $headercodes= Headercode::get();
        return view('headercode.index',compact('headercodes'));

}

    public function store(Request $request)
    {
        $newItem = $request->all();

        // احصل على جميع الملفات من الطلب
        $files = $request->allFiles();
        
        // حلقة عبر الملفات لمعرفة ما إذا كانت صورة
        foreach ($files as $key => $file) {
            // التحقق مما إذا كان الملف صورة
            if ($file->isValid() && in_array($file->extension(), ['jpeg', 'png', 'jpg', 'gif', 'svg','webp'])) {
                // استخدم الهيلبر لتحميل الصورة والحصول على مسارها
                $newItem[$key] = ImageHelper::handleImageUpload($file, 'uploads/Headercode_images');
            }
        }
        
        // إنشاء العنصر الجديد في قاعدة البيانات
        Headercode::create($newItem);
        
        // إعادة التوجيه إلى صفحة العرض
        return redirect(route('headercode.index.web'));
        
    }

    public function update(Request $request, $id)
    {
        // العثور على العنصر باستخدام الـ ID
        $updateItem = Headercode::findOrFail($id);

        // الحصول على جميع البيانات من الطلب
        $updateData = $request->all();

        // الحصول على جميع الملفات من الطلب
        $files = $request->allFiles();

        // حلقة عبر الملفات لمعالجة الصور
        foreach ($files as $key => $file) {
            // التحقق مما إذا كان الملف صورة صالحة
            if ($file->isValid() && in_array($file->extension(), ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'])) {
                // حذف الصورة القديمة إذا كانت موجودة
                if (isset($updateItem[$key]) && !empty($updateItem[$key])) {
                    ImageHelper::deleteImage($updateItem[$key]); // استخدم الهيلبر لحذف الصورة القديمة
                }

                // استخدام الهيلبر لتحميل الصورة الجديدة والحصول على مسارها
                $updateData[$key] = ImageHelper::handleImageUpload($file, 'uploads/Headercode_images');
            }
        }

        // تحديث البيانات في قاعدة البيانات
        $updateItem->update($updateData);

        // إعادة التوجيه إلى صفحة العرض
        return redirect()->route('headercode.index.web')->with('success', 'Item updated successfully!');
    }


}