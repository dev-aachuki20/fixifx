<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            // $table->foreignId('category_id')->constrained('share_categories');
            // $table->foreign('category_id')->references('id')->on('share_categories');
            $table->string('symbol')->nullable();
            $table->string('ja_symbol')->nullable();
            $table->string('description')->nullable();
            $table->string('ja_description')->nullable();
            $table->string('margin')->nullable();
            $table->string('ja_margin')->nullable();
            $table->string('contract')->nullable();
            $table->string('ja_contract')->nullable();
            $table->string('type')->nullable();
            $table->string('ja_type')->nullable();
            $table->string('currency_base')->nullable();
            $table->string('ja_currency_base')->nullable();
            $table->string('min_trade_size')->nullable();
            $table->string('ja_min_trade_size')->nullable();
            $table->string('max_trade_size')->nullable();
            $table->string('ja_max_trade_size')->nullable();
            $table->string('max_levarage')->nullable();
            $table->string('ja_max_levarage')->nullable();
            $table->string('day_swap')->nullable();
            $table->string('ja_day_swap')->nullable();
            $table->string('long_swap')->nullable();
            $table->string('ja_long_swap')->nullable();
            $table->string('short_swap')->nullable();
            $table->string('ja_short_swap')->nullable();
            $table->string('holding_period')->nullable();
            $table->string('ja_holding_period')->nullable();
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
        Schema::dropIfExists('shares');
    }
}
