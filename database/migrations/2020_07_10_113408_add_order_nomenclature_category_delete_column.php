<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderNomenclatureCategoryDeleteColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
