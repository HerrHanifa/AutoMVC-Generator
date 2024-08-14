<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testfront2 extends Model
{
    protected $table = 'testfront2s';
    protected $fillable = ['Name', 'Nummer', 'discripe', 'image', 'date'];
    protected $hidden = [];

    
}