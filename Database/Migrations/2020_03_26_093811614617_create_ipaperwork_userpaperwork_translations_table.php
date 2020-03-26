<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaperworkUserPaperworkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaperwork__userpaperwork_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('userpaperwork_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['userpaperwork_id', 'locale']);
            $table->foreign('userpaperwork_id')->references('id')->on('ipaperwork__userpaperworks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipaperwork__userpaperwork_translations', function (Blueprint $table) {
            $table->dropForeign(['userpaperwork_id']);
        });
        Schema::dropIfExists('ipaperwork__userpaperwork_translations');
    }
}
