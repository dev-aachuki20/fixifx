<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forexes', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->nullable();
            $table->string('ja_symbol')->nullable();
            $table->string('description')->nullable();
            $table->string('ja_description')->nullable();
            $table->string('currency_base')->nullable();
            $table->string('ja_currency_base')->nullable();
            $table->string('margin_currency')->nullable();
            $table->string('ja_margin_currency')->nullable();
            $table->string('contract_size')->nullable();
            $table->string('ja_contract_size')->nullable();
            $table->string('max_levarage')->nullable();
            $table->string('max_volume_trade')->nullable();
            $table->string('ja_max_volume_trade')->nullable();
            $table->string('ja_max_levarage')->nullable();
            $table->string('min_volume_trade')->nullable();
            $table->string('ja_min_volume_trade')->nullable();
            $table->string('long_swap')->nullable();
            $table->string('ja_long_swap')->nullable();
            $table->string('short_swap')->nullable();
            $table->string('ja_short_swap')->nullable();
            $table->string('holding_period')->nullable();
            $table->string('ja_holding_period')->nullable();
            $table->string('grant_date')->nullable();
            $table->string('ja_grant_date')->nullable();
            $table->string('trading_hours')->nullable();
            $table->string('ja_trading_hours')->nullable();
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
        Schema::dropIfExists('forexes');
    }
}
