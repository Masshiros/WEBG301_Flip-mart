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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
        ->references('id')->on('categories')->onDelete('cascade')->onUpdate(('cascade'));
            $table->string('subcategory_name_en');
            $table->string('subcategory_name_cn');
            $table->string('subcategory_name_vn');
            $table->string('subcategory_slug_en');
            $table->string('subcategory_slug_cn');
            $table->string('subcategory_slug_vn');
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