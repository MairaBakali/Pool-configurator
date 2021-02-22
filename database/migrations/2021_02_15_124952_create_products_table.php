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
            $table->bigInteger('product_id');
            $table->bigInteger('detail_id');
            $table->string('name')->nullable(true);
            $table->text('description_long')->nullable(true);
            $table->boolean('active')->nullable(true);
            $table->string('order_number');
            $table->bigInteger('in_Stock')->nullable(true);
            $table->bigInteger('stock_min')->nullable(true);
            $table->boolean('shipping_free')->nullable(true);
            $table->string('customer_group_key')->nullable(true);
            $table->integer('tax_percent')->nullable(true);
            $table->string('price')->nullable(true);
            $table->text('property_group')->nullable(true);
            $table->text('category')->nullable(true);
            $table->text('media')->nullable(true);
            $table->text('attr1')->nullable(true);
            $table->text('attr2')->nullable(true);
            $table->text('attr3')->nullable(true);
            $table->string('hash_id')->nullable(true);
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
