<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testfront extends Model
{
    protected $table = 'testfronts';
    protected $fillable = ['Name', 'Nummer', 'date', 'image', 'discripe'];
    protected $hidden = [];

    
}