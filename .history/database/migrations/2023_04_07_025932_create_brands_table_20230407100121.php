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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->id('brand_name_en');
            $table->id('brand_name_vn');
            $table->id('brand_name_cn');
            $table->id('brand_slug_en');
            $table->id('brand_slug_vn');
            $table->id('brand_slug_cn');
            $table->id('brand_image');
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
        Schema::dropIfExists('brands');
    }
};