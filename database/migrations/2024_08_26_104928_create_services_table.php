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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
$table->string('name_en')->nullable();
$table->string('keywords')->nullable();
$table->string('keywords_en')->nullable();
$table->string('image')->nullable();
$table->text('description')->nullable();
$table->text('description_en')->nullable();
$table->text('description_meta')->nullable();
$table->text('description_meta_en')->nullable();

            
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
        Schema::dropIfExists('services');
    }
};