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
        Schema::create('mainpages', function (Blueprint $table) {
            $table->id();
            $table->string('introduction')->nullable();
$table->string('introduction_en')->nullable();
$table->string('keywords')->nullable();
$table->string('keywords_en')->nullable();
$table->string('image')->nullable();
$table->string('video')->nullable();
$table->text('description_introduction')->nullable();
$table->text('description_introduction_en')->nullable();
$table->text('description_meta')->nullable();
$table->text('description_meta_en')->nullable();
$table->text('google_maps')->nullable();

            
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
        Schema::dropIfExists('mainpages');
    }
};