<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['name', 'name_en', 'keywords', 'keywords_en', 'image', 'description', 'description_en', 'description_meta', 'description_meta_en'];
    protected $hidden = [];
    protected $fileColumn = ['image'];

    public function fileColumns()
    {
        return $this->fileColumn;
    }

    
}