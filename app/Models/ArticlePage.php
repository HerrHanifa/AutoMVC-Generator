<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePage extends Model
{
    use HasFactory;
    public $guarded=['id','created_at','updated_at','article_id','page_id'];
}
