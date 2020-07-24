<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientsUserIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex('clients_email_index');

            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('email');

            $table->unsignedBigInteger('user_id')->after('id');

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex('clients_user_id_index');

            $table->dropColumn('user_id');

            $table->string('name', 100)
                ->after('id');
            $table->string('phone', 50)
                ->nullable()
                ->after('user_id');
            $table->string('email', 100)
                ->after('phone');

            $table->index('email');
        });
    }
}
