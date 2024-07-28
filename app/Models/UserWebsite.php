<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;


class UserWebsite extends Model
{
    protected $table="userswebsite";
	// protected $guarded = ['id', 'created_at', 'updated_at','name','phone','national_id','lastCertification','job','gender','isWantWork','img','typeOfSubscribing'];
    protected $fillable = ['name','phone','national_id','lastCertification','job','gender','isWantWork','image','typeOfSubscribing'];

    public function image($type="original"){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->image,$type);
    }
}
