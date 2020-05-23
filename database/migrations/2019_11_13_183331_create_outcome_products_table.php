<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcome_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outcome_id');
            $table->unsignedBigInteger('nomenclature_id');
            $table->unsignedSmallInteger('count');
            $table->unsignedSmallInteger('refund_count');
            $table->unsignedSmallInteger('discount');
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
        Schema::dropIfExists('outcome_products');
    }
}
