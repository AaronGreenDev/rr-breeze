<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddtemplateMedIdColumnToMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->unsignedBigInteger('template_med_id')->unsigned()->nullable()->after('pack_id');
            $table->foreign('template_med_id')->references('id')->on('template_meds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropForeign(['template_med_id']);
            $table->dropColumn('template_med_id');
        });
    }
}
