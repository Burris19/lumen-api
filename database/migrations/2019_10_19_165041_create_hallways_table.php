<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallways', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code')->unique();
            $table->mediumText('description');
            $table->unsignedBigInteger('cellar_id');

            $table->foreign('cellar_id')->references('id')->on('wineries');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hallways');
    }
}
