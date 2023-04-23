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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('districts_id');
            $table->foreign('districts_id')
                ->references('id')->on('ship_districts')->onDelete('cascade')->onUpdate(('cascade'));
                $table->string('shipping_name');
                $table->string('shipping_email');
                $table->string('shipping_phone');
                $table->integer('post_code');
                $table->text('notes');
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
        Schema::dropIfExists('shippings');
    }
};