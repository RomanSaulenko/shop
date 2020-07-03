<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingBucketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_bucket', function (Blueprint $table) {
            $table->string('id');
            $table->string('instance');
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['id', 'instance']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_bucket');
    }
}
