<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headercodes', function (Blueprint $table) {
            $table->id();
            $table->text('Facebook_Pixel');
$table->text('Google_Analytics');
$table->text('Google_Ads_Conversion_Tracking');
$table->text('Google_Tag_Manager');
$table->text('LinkedIn_Insight_Tag');
$table->text('Twitter_Pixel');
$table->text('Pinterest_Tag');
$table->text('Hotjar_Tracking_Code');
$table->text('Crazy_Egg_Tracking_Code');
$table->text('Affiliate_Tracking_Codes');
$table->text('HubSpot_Tracking_Code');
$table->text('Snapchat_Pixel');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('headercodes');
    }
};