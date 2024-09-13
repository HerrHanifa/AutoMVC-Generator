<?php

namespace App\Functions;

use Illuminate\Http\Request;

trait StoreFunction
{
    public function store(Request $request)
    {
        // Alle Daten aus der Anfrage abrufen
        $newItem = $request->all();

        // Alle Dateien aus der Anfrage abrufen (falls Datei vorhanden sind)
        $files = $request->allFiles();
        
        // Schleife durch die Dateien, um Bilder zu verarbeiten
        foreach ($files as $key => $file) {
            // Überprüfen, ob die Datei ein gültiges Bild ist
            if ($file->isValid() && in_array($file->extension(), ['jpeg', 'png', 'jpg', 'gif', 'svg','webp','mp4'])) {
                // Hilfsfunktion verwenden, um das neue Bild hochzuladen und den Pfad zu erhalten
                $newItem[$key] = ImageHelper::handleImageUpload($file, 'uploads/ModalName_images');
            }
        }
        
        // Das neue Element in der Datenbank erstellen
        ModalName::create($newItem);
        
        // Zur Anzeige-Seite weiterleiten
        return redirect(route('modalName.index.web'));
        
    }

}
