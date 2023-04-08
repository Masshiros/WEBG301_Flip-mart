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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->id('category_name_en');
            $table->id('category_name_vn');
            $table->id('category_name_cn');
            $table->id('category_slug_en');
            $table->id('category_slug_vn');
            $table->id('category_slug_cn');
            $table->id('category_icon');
            $table->id();
            $table->id();
            $table->id();
            $table->id();
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
        Schema::dropIfExists('categories');
    }
};