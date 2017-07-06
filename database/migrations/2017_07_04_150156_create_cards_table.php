<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('user_id');
            $table->integer('last4')->nullable();
            $table->string('cardType')->nullable();
            $table->string('cardholderName')->nullable();
            $table->string('expirationMonth')->nullable();
            $table->string('expirationYear')->nullable();
            $table->string('maskedNumber')->nullable();
            $table->string('uniqueNumberIdentifier')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('success')->default(0);
            $table->tinyInteger('defaultPaymentMethod')->default(0);
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
        Schema::drop('cards');
    }
}
