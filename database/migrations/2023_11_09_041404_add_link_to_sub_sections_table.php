<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToSubSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_sections', function (Blueprint $table) {
            $table->longText('en_link')->nullable()->after('ja_image');
            $table->longText('ja_link')->nullable()->after('en_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_sections', function (Blueprint $table) {
            $table->dropColumn('en_link');
            $table->dropColumn('ja_link');
        });
    }
}
