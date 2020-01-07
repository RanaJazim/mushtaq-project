<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('party_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('productColor');
            $table->string('productSize');
            $table->string('productQty');
            $table->string('productRate');
            $table->string('totalPrice')->nullable();
            $table->string('vehicleNumber');
            $table->string('driverName');
            $table->string('deliveredBy');
            $table->string('preparedBy');
            $table->string('remaining')->nullable();
            $table->timestamps();

            $table->foreign('party_id')->references('id')
                ->on('parties')->onDelete('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inwards');
    }
}
