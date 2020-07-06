<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomenclatureDescriptionColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nomenclatures', function (Blueprint $table) {
        $table->text('description')
            ->after('price_procurement')
        ;
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nomenclatures', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
