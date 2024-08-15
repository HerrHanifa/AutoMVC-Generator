<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test2 extends Model
{
    protected $table = 'test2s';
    protected $fillable = ['Name', 'Nummer'];
    protected $hidden = [];

    
}