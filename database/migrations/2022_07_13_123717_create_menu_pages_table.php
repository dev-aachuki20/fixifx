<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus');
            $table->foreignId('sub_menu_id')->constrained('sub_menus');
            $table->string('en_name')->nullable();
            $table->string('ja_name')->nullable();

            $table->string('en_title')->nullable();
            $table->string('ja_title')->nullable();

            $table->string('en_desc')->nullable();
            $table->string('ja_desc')->nullable();
            
            $table->string('bg_img')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('menu_pages');
    }
}
