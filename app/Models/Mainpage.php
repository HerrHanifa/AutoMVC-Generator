<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mainpage extends Model
{
    protected $table = 'mainpages';
    protected $fillable = ['introduction', 'introduction_en', 'keywords', 'keywords_en', 'image', 'video', 'description_introduction', 'description_introduction_en', 'description_meta', 'description_meta_en', 'google_maps'];
    protected $hidden = [];
    protected $fileColumn = ['image', 'video'];

    public function fileColumns()
    {
        return $this->fileColumn;
    }

    
}