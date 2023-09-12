<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name')->default('Unnamed Product');
            $table->string('product_description')->nullable();
            $table->string('main_image');
            $table->string('other_images')->nullable();
            //$table->integer('product_color');
            $table->integer('product_price')->default(0); 
            $table->integer('quantity_m')->nullable();
            $table->integer('quantity_l')->nullable();
            $table->integer('quantity_xl')->nullable();
            $table->integer('total_quantity')->nullable();
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
}
