<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letzteprüfung extends Model
{
    protected $table = 'letzteprüfungs';
    protected $fillable = ['Name', 'discripe'];
    protected $hidden = [];

    
}