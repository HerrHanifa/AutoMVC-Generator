<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finishtest extends Model
{
      protected $table = 'finishtest';
    protected $fillable = ['name', 'description', 'last'];
    protected $hidden = [];

    
}