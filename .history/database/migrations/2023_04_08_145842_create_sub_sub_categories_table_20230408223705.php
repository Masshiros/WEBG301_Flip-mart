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
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')
        ->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate(('cascade'));
            $table->string('subsubcategory_name_en');
            $table->string('subsubcategory_name_vn');
            $table->string('subsubcategory_name_cn');
            $table->string('subsubcategory_slug_en');
            $table->string('subsubcategory_slug_vn');
            $table->string('subsubcategory_slug_cn');
        
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
        Schema::dropIfExists('sub_sub_categories');
    }
};