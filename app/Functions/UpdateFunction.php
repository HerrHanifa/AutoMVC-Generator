<?php

namespace App\Functions;

use Illuminate\Http\Request;
use App\Helpers\ImageHelper;

trait UpdateFunction
{
    /**
     * Aktualisiert ein Element mit der angegebenen ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // جلب العنصر المراد تحديثه من قاعدة البيانات
        $updateItem = ModalName::findOrFail($id);
    
        // الحصول على جميع البيانات من الطلب
        $updateData = $request->all();
    
        // الحصول على جميع الملفات من الطلب (في حال وجود صور)
        $files = $request->allFiles();

        // Schleife durch die Dateien, um Bilder zu verarbeiten
        foreach ($files as $key => $file) {
            // Überprüfen, ob die Datei ein gültiges Bild ist
            if ($file->isValid() && in_array($file->extension(), ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'])) {
                // Altes Bild löschen, falls vorhanden
                if (isset($updateItem[$key]) && !empty($updateItem[$key])) {
                    ImageHelper::deleteImage($updateItem[$key]); // Hilfsfunktion zum Löschen des alten Bildes verwenden
                }

                // Hilfsfunktion verwenden, um das neue Bild hochzuladen und den Pfad zu erhalten
                $updateData[$key] = ImageHelper::handleImageUpload($file, 'uploads/ModalName_images');
            }
        }

        // Daten in der Datenbank aktualisieren
        $updateItem->update($updateData);

        // Zur Anzeige-Seite weiterleiten
        return redirect()->route('modalName.index.web')->with('success', 'Item updated successfully!');
    }
}