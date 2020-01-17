<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantsheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id')->index();
            $table->unsignedBigInteger('rawmaterial_id')->index();
            $table->string('partyName');
            $table->string('nali');
            $table->string('sheet');
            $table->integer('useWeight');
            $table->string('size');
            $table->timestamps();

            $table->foreign('machine_id')->references('id')
                ->on('machines')->onDelete('cascade');
            $table->foreign('rawmaterial_id')->references('id')
                ->on('rawmaterials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantsheets');
    }
}
