<?php

namespace App\Http\Controllers\controlPanal;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \App\Functions\CreateFunction;
use \App\Functions\DeleteFunction;
use \App\Functions\EditFunction;
use \App\Functions\IndexFunction;
use \App\Functions\StoreFunction;
use \App\Functions\UpdateFunction;

use App\Models\Service;

class ServiceController extends Controller
{
        public function create()
    {
        return view('service.create');
    }

    public function delete($id)
    {
        // العثور على العنصر باستخدام الـ ID
        $item = Service::findOrFail($id);

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
        return redirect()->route('service.index.web')
                         ->with('success', 'Item deleted successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service.edit',compact('service'));
    }

    public function index()
    {

        $services= Service::get();
        return view('service.index',compact('services'));

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
                $newItem[$key] = ImageHelper::handleImageUpload($file, 'uploads/Service_images');
            }
        }
        
        // إنشاء العنصر الجديد في قاعدة البيانات
        Service::create($newItem);
        
        // إعادة التوجيه إلى صفحة العرض
        return redirect(route('service.index.web'));
        
    }

    public function update(Request $request, $id)
    {
        // العثور على العنصر باستخدام الـ ID
        $updateItem = Service::findOrFail($id);

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
                $updateData[$key] = ImageHelper::handleImageUpload($file, 'uploads/Service_images');
            }
        }

        // تحديث البيانات في قاعدة البيانات
        $updateItem->update($updateData);

        // إعادة التوجيه إلى صفحة العرض
        return redirect()->route('service.index.web')->with('success', 'Item updated successfully!');
    }


}