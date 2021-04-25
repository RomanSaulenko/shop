<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClients25042021 extends Migration
{
    protected string $table = 'clients';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->string('name')
                ->after('id');
            $table->string('phone', 50)
                ->after('name');
            $table->timestamp('email')
                ->after('phone');
            $table->timestamp('email_verified_at')
                ->nullable()
                ->after('email');
            $table->string('password')
                ->after('email_verified_at');
            $table->string('remember_token')
                ->nullable()
                ->after('password');

            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');

            $table->bigInteger('user_id');
        });
    }
}
