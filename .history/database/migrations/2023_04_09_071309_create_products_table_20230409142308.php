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
            $table->string('product_name_en');
            $table->string('product_name_vn');
            $table->string('product_name_cn');
            $table->string('product_slug_en');
            $table->string('product_slug_vn');
            $table->string('product_slug_cn');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_tags_en');
            $table->string('product_tags_vn');
            $table->string('product_tags_cn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_vn')->nullable();
            $table->string('product_size_cn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_vn');
            $table->string('product_color_cn');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_en');
            $table->string('short_description_vn');
            $table->string('short_description_cn');
            $table->string('long_description_en');
            $table->string('long_description_vn');
            $table->string('long_description_cn');
            $table->string('product_thumbnail');
            $table->string('hot_deals')->nullable();
            $table->string('featured')->nullable();
            $table->string('special_offer')->nullable();;
            $table->string('special_deals')->nullable();
            $table->id('status')->default(0);
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