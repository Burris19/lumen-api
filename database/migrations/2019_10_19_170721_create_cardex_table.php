<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardex', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->date('date_transaction');

            $table->unsignedBigInteger('cellar_from_id')->nullable();
            $table->unsignedBigInteger('cellar_to_id')->nullable();
            $table->unsignedBigInteger('product_id');

            $table->foreign('cellar_from_id')->references('id')->on('wineries');
            $table->foreign('cellar_to_id')->references('id')->on('wineries');
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('cardex');
    }
}
