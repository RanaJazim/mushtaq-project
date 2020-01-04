<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('party_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('gpNumber');
            $table->string('remarks');
            $table->string('wrStatus');
            $table->string('poNumber');
            $table->string('vehicleNumber');
            $table->string('size');
            $table->string('rate');
            $table->string('qty');
            $table->string('value');
            $table->integer('stTaxValue')->nullable();
            $table->string('whtTax')->nullable();
            $table->string('whtValue')->nullable();
            $table->string('totalValue');
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
        Schema::dropIfExists('invoices');
    }
}
