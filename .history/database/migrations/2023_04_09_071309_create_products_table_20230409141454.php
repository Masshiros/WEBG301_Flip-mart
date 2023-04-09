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
            $table->id('subsub');
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