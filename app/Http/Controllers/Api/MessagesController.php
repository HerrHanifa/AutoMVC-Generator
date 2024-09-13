<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use \App\Functions\StoreFunction;

use App\Models\Messages;

class MessagesController extends Controller
{
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
                $newItem[$key] = ImageHelper::handleImageUpload($file, 'uploads/Messages_images');
            }
        }
        
        // إنشاء العنصر الجديد في قاعدة البيانات
        Messages::create($newItem);
        
        // إعادة التوجيه إلى صفحة العرض
        return redirect(route('messages.index.web'));
        
    }

}