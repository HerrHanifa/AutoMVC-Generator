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
        Schema::table('articles', function (Blueprint $table) {

    if (!Schema::hasColumn('articles', 'post_parent')) {
        $table->bigInteger('post_parent')->default(0)->nullable();
    }

    $table->string('post_status', 20)->default('publish');

    $table->string('post_type', 20)->default('post');

});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
