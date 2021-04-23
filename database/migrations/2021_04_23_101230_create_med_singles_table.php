<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedSinglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_singles', function (Blueprint $table) {
            $table->id('med_single_id');
            $table->integer('med_id')->unsigned()->nullable();
            $table->string('med_single_name');
            $table->integer('med_single_batch_no');
            $table->date('med_single_expiry_date');
            $table->string('med_single_location');
            $table->string('med_single_status')->default('In Date');
            $table->timestamps();
            
            $table->foreign('med_id')->references('medicine_id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med_singles');
    }
}
