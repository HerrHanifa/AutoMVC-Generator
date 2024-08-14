<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zakortest extends Model
{
    protected $table = 'zakortests';
    protected $fillable = ['Name', 'discripe'];
    protected $hidden = [];

    
}