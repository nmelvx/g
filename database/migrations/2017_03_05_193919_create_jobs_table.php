<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->nullabe();
            $table->date('date')->nullabe();
            $table->time('time')->nullabe();
            $table->integer('area')->nullabe();
            $table->integer('sum')->nullabe();
            $table->integer('total_duration')->nullabe();
            $table->string('address')->nullabe();
            $table->string('observations')->nullabe();
            $table->integer('team_id')->index()->nullabe();
            $table->integer('user_id')->index()->nullabe();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('payed')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
