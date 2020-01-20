<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inward_id')->index();
            $table->string('partyName');
            $table->string('nali');
            $table->string('sheetPly');
            $table->integer('size');
            $table->integer('sheet');
            $table->timestamps();

            $table->foreign('inward_id')->references('id')
                ->on('inwards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantinfos');
    }
}
