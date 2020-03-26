<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaperworkPaperworkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaperwork__paperwork_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('paperwork_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['paperwork_id', 'locale']);
            $table->foreign('paperwork_id')->references('id')->on('ipaperwork__paperworks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipaperwork__paperwork_translations', function (Blueprint $table) {
            $table->dropForeign(['paperwork_id']);
        });
        Schema::dropIfExists('ipaperwork__paperwork_translations');
    }
}
