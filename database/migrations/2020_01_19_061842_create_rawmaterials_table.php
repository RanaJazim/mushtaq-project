<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawmaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawmaterials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inward_id')->index();
            $table->unsignedBigInteger('machine_id')->index();
            $table->integer('issue');
            $table->timestamps();

            $table->foreign('inward_id')->references('id')
                ->on('inwards')->onDelete('cascade');
            $table->foreign('machine_id')->references('id')
                ->on('machines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawmaterials');
    }
}
