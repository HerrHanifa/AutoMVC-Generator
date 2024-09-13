<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['name', 'email', 'phone_number', 'company', 'message_content'];
    protected $hidden = [];
    protected $fileColumn = [];

    public function fileColumns()
    {
        return $this->fileColumn;
    }

    
}