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
        Schema::create('multi_imgs', function (Blueprint $table) {
            $table->id();
            $table->id('product_id');
            $table->foreign('subcategory_id')
            ->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate(('cascade'));
            $table->id('photo_name');
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
        Schema::dropIfExists('multi_imgs');
    }
};