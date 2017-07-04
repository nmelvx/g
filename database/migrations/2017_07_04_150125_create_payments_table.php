<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId')->index('orderId');
            $table->integer('amount');
            $table->integer('customerId')->default(0)->index('customerId');
            $table->string('paymentMethodNonce')->nullable();
            $table->tinyInteger('transactionSuccess')->default(false);
            $table->string('transactionType')->nullable();
            $table->string('transactionStatus')->nullable();
            $table->integer('processorResponseCode')->nullable();
            $table->string('processorResponseText')->nullable();
            $table->string('additionalProcessorResponse')->nullable();
            $table->string('processorSettlementResponseCode')->nullable();
            $table->string('processorSettlementResponseText')->nullable();
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
        Schema::drop('payments');
    }
}
