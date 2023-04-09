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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->id('brand_id');
            $table->id('subsubcategory_id');
            $table->id('product_name_en');
            $table->id('product_name_vn');
            $table->id('product_name_cn');
            $table->id('product_slug_en');
            $table->id('product_slug_en');
            $table->id('product_slug_en');
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
            $table->id();
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
        Schema::dropIfExists('products');
    }
};