<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['name', 'name_en', 'description', 'description_en'];
    protected $hidden = [];
    protected $fileColumn = [];

    public function fileColumns()
    {
        return $this->fileColumn;
    }

    
}