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
            $table->id('product_slug_vn');
            $table->id('product_slug_cn');
            $table->id('product_code');
            $table->id('product_quantity');
            $table->id('product_tags_en');
            $table->id('product_tags_vn');
            $table->id('product_tags_cn');
            $table->id('product_size_en');
            $table->id('product_size_vn');
            $table->id('product_size_cn');
            $table->id('product_color_en');
            $table->id('product_color_vn');
            $table->id('product_color_cn');
            $table->id('selling_price');
            $table->id('discount_price');
            $table->id('short_description_en');
            $table->id('short_description_vn');
            $table->id('short_description_cn');
            $table->id('long_description_en');
            $table->id('long_description_vn');
            $table->id('long_description_cn');
            $table->id('product_thumbnail');
            $table->id('hot_deals')->nullable();
            $table->id('featured')->nullable();
            $table->id('special_offer')->nullable();;
            $table->id('special_deals');
            $table->id('status');
            
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