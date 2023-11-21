<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBasicAccountToSpreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spreads', function (Blueprint $table) {
            $table->string('basic_account')->nullable()->after('starter_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spreads', function (Blueprint $table) {
            $table->dropColumn('basic_account');
        });
    }
}
