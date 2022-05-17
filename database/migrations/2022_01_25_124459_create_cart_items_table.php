<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('bc_line_item_id',50);
            $table->unsignedBigInteger('parentId');
            $table->unsignedBigInteger('variantId');
            $table->unsignedBigInteger('productId');
            $table->string('sku');
            $table->string('name');
            $table->string('url');
            $table->unsignedInteger('quantity');
            $table->string('brand')->nullable();
            $table->string('imageUrl');
            $table->float('listPrice',8,2,true);
            $table->float('salePrice',8,2,true);
            $table->float('extendedListPrice',8,2,true);
            $table->float('extendedSalePrice',8,2,true);
            $table->boolean('isShippingRequired');
            $table->string('type',100);
            $table->foreignId('cart_id')->references('id')->on('carts')->cascadeOnDelete();
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
        Schema::dropIfExists('cart_items');
    }
}
