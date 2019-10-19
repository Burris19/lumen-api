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
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->mediumText('description');
            $table->float('cost_price', 8, 2);
            $table->float('sale_price', 8, 2);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('rack_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('rack_id')->references('id')->on('shelves');

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
