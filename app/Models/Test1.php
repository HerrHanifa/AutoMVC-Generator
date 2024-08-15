<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test1 extends Model
{
    protected $table = 'test1s';
    protected $fillable = ['Name', 'discripe'];
    protected $hidden = [];

    
}