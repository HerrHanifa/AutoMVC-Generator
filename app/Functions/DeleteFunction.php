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
    // Das Element anhand der ID finden
    $item = ModalName::findOrFail($id);

        // Die Datei-Spalten abrufen
        $fileColumns = $item->fileColumns();

        if ($fileColumns) {
            foreach ($fileColumns as $column) {
                // Den vollständige Pfad der Datei im Public-Ordener abrufen
                $filePath = public_path($item->$column);

               // Überprüfen, ob eine Datei im Pfad vorhanden ist oder nicht
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        }

           // Die Datei aus der Datenbank löschen

        $item->delete();

    // Weiterleiten zur Anzeige-Seite mit einer Erfolgsmeldung

    return redirect()->route('modalName.index.web')
                         ->with('success', 'Item deleted successfully!');
    }
}
