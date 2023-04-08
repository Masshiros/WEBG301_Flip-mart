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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->id('category_id');
            $table->id('subcategory_name_en');
            $table->id('subcategory_name_cn');
            $table->id('subcategory_name_vn');
            $table->id('subcategory_slug_en');
            $table->id('subcategory_slug_cn');
            $table->id('subcategory_slug_cn');
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
        Schema::dropIfExists('sub_categories');
    }
};