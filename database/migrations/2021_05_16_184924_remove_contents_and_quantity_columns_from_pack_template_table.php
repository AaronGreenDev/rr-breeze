<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveContentsAndQuantityColumnsFromPackTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pack_templates', function (Blueprint $table) {
            $table->dropColumn('contains');
            $table->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pack_templates', function (Blueprint $table) {
            //
        });
    }
}
