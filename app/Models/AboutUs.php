<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table="about_us";
    protected $fillable = ['title_ar','title_en','description1_ar','description1_en','description2_ar','description2_en'];
 
}
