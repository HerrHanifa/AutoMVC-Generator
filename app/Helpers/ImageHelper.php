<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;


class ImageHelper
{
    // دالة لتحميل الصورة
    public static function handleImageUpload($image, $directory)
    {
        $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($directory), $imageName);
        return $directory . '/' . $imageName;
    }

    // دالة لحذف الصورة
    public static function deleteImage($imagePath)
    {
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }

    // دالة لتحديث الصورة
    public static function updateImage($newImage, $directory, $oldImagePath = null)
    {
        // حذف الصورة القديمة إذا كانت موجودة
        if ($oldImagePath) {
            self::deleteImage($oldImagePath);
        }

        // تحميل الصورة الجديدة
        return self::handleImageUpload($newImage, $directory);
    }



    public static function findFileColumns($item, $ModalName)
    {
        $fileColumns = [];
        
        // إنشاء كائن نموذج
        $modelInstance = new $ModalName;
    
        // الحصول على جميع الأعمدة في الجدول المرتبط بالنموذج
        $columns = Schema::getColumnListing($modelInstance->getTable());
    
        foreach ($columns as $column) {
            $filePath = $item->$column;
            
            // تحقق مما إذا كان هذا العمود يحتوي على مسار ملف
            if ($filePath && is_string($filePath) && Storage::exists($filePath)) {
                $fileColumns[] = $column;
            }
        }
        
        return $fileColumns;
    }

}
