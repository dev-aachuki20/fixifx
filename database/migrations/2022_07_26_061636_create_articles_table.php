<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable()->comment('0 = home_page');
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('en_title')->nullable();
            $table->string('ja_title')->nullable();
            $table->longText('en_desc')->nullable();
            $table->longText('ja_desc')->nullable();
            $table->text('tags')->nullable();
            $table->text('image')->nullable();
            $table->text('sub_image')->nullable();
            $table->text('thumb_img')->nullable();
            $table->date('event_date')->nullable();
            $table->string('category')->nullable();
            $table->boolean('status')->default(1)->comment('0=in-active, 1=active');
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
