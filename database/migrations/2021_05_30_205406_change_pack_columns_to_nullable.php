<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePackColumnsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('med_packs', function (Blueprint $table) {
            $table->string('status')->nullable()->change();
            $table->string('assigned_to')->nullable()->change();
            $table->string('pack_location')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('med_packs', function (Blueprint $table) {
            //
        });
    }
}
