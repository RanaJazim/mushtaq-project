<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishstores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partyName');
            $table->string('description');
            $table->integer('size');
            $table->string('color');
            $table->integer('quantity');
            $table->integer('waste');
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
        Schema::dropIfExists('finishstores');
    }
}
