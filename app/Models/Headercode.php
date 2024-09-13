<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headercode extends Model
{
    protected $table = 'headercodes';
    protected $fillable = ['Facebook_Pixel', 'Google_Analytics', 'Google_Ads_Conversion_Tracking', 'Google_Tag_Manager', 'LinkedIn_Insight_Tag', 'Twitter_Pixel', 'Pinterest_Tag', 'Hotjar_Tracking_Code', 'Crazy_Egg_Tracking_Code', 'Affiliate_Tracking_Codes', 'HubSpot_Tracking_Code', 'Snapchat_Pixel'];
    protected $hidden = [];
    protected $fileColumn = [];

    public function fileColumns()
    {
        return $this->fileColumn;
    }

    
}