<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('uuid')->unique();
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('asin_code');
            $table->string('name');
            $table->decimal('price', 6, 2);
            $table->integer('quantity');
            $table->string('url');
            $table->string('color')->default(null);
            $table->decimal('weight', 5, 2)->default(null);
            $table->decimal('length', 5, 2)->default(null);
            $table->decimal('width', 5, 2)->default(null);
            $table->decimal('height', 5, 2)->default(null);
            $table->decimal('size', 5, 2)->default(null);
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
        Schema::drop('products');
    }
}
