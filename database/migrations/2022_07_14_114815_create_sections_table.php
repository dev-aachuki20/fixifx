<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable()->comment('0 = home_page, -1 = footer');
            $table->integer('section_no')->comment('sequence number of section');
            $table->string('en_title')->nullable();
            $table->string('ja_title')->nullable();
            $table->longText('en_desc')->nullable();
            $table->longText('ja_desc')->nullable();
            $table->string('en_count_text')->nullable();
            $table->string('ja_count_text')->nullable();
            $table->string('en_short_text')->nullable();
            $table->string('ja_short_text')->nullable();
            $table->string('image')->nullable();
            $table->string('ja_image')->nullable();
            $table->string('video_url')->comment('youtube link')->nullable();
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
        Schema::dropIfExists('sections');
    }
}
