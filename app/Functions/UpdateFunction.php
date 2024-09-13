<?php

namespace App\Functions;

use Illuminate\Http\Request;
use App\Helpers\ImageHelper;

trait UpdateFunction
{
    /**
     * Update an item with the given ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // العثور على العنصر باستخدام الـ ID
        $updateItem = ModalName::findOrFail($id);

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
                $updateData[$key] = ImageHelper::handleImageUpload($file, 'uploads/ModalName_images');
            }
        }

        // تحديث البيانات في قاعدة البيانات
        $updateItem->update($updateData);

        // إعادة التوجيه إلى صفحة العرض
        return redirect()->route('modalName.index.web')->with('success', 'Item updated successfully!');
    }
}
