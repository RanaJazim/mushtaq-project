<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('party_id')->index();
            $table->string('date');
            $table->string('itemName');
            $table->integer('size');
            $table->string('color');
            $table->integer('quantityOrder');
            $table->timestamps();

            $table->foreign('party_id')->references('id')
                ->on('parties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos');
    }
}
