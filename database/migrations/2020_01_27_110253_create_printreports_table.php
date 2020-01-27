<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printreports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inward_id')->index();
            $table->integer('gas');
            $table->integer('perGas');
            $table->integer('starchUse');
            $table->integer('perStarchUse');
            $table->integer('causticSoda');
            $table->integer('perCausticSoda');
            $table->integer('borex');
            $table->integer('perBorex');
            $table->integer('wood');
            $table->integer('perWood');
            $table->integer('electricity');
            $table->integer('labSheet');
            $table->integer('office');
            $table->integer('firstTotal');
            $table->integer('labCtn');
            $table->integer('priCh');
            $table->integer('pinCh');
            $table->integer('secondTotal');
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
        Schema::dropIfExists('printreports');
    }
}
