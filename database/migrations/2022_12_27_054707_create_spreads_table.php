<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spreads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('spread_categories');
            $table->string('symbol')->nullable();
            $table->string('ja_symbol')->nullable();
            $table->string('ultimate_account')->nullable();
            $table->string('premium_account')->nullable();
            $table->string('starter_account')->nullable();
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
        Schema::dropIfExists('spreads');
    }
}
