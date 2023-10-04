<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable()->comment('0 = home_page');
            $table->integer('section_no')->nullable();
            $table->string('logo')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('ja_payment_name')->nullable();
            $table->string('payment_link')->nullable();
            $table->longText('en_desc')->nullable();
            $table->longText('ja_desc')->nullable();
            $table->boolean('status')->default(1)->comment('0=in-active, 1=active');
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
        Schema::dropIfExists('payment_types');
    }
}
