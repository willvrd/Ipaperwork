<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaperworkUserPaperworkHistoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaperwork__userpaperworkhistory_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('userpaperworkhistory_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['userpaperworkhistory_id', 'locale']);
            $table->foreign('userpaperworkhistory_id')->references('id')->on('ipaperwork__userpaperworkhistories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipaperwork__userpaperworkhistory_translations', function (Blueprint $table) {
            $table->dropForeign(['userpaperworkhistory_id']);
        });
        Schema::dropIfExists('ipaperwork__userpaperworkhistory_translations');
    }
}
