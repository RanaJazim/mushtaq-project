<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('po_id')->index();
            $table->string('ogpNumber');
            $table->integer('sendQuantity');
            $table->timestamps();

            $table->foreign('po_id')->references('id')
                ->on('pos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poinfos');
    }
}
