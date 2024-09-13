<?php

namespace App\Functions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait DeleteFunction
{
    /**
     * Delete an item by its ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        // العثور على العنصر باستخدام الـ ID
        $item = ModalName::findOrFail($id);

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
        return redirect()->route('modalName.index.web')
                         ->with('success', 'Item deleted successfully!');
    }
}
