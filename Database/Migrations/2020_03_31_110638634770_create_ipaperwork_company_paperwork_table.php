<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaperworkCompanyPaperworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaperwork__company_paperwork', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('ipaperwork__companies')->onDelete('cascade');

            $table->integer('paperwork_id')->unsigned();
            $table->foreign('paperwork_id')->references('id')->on('ipaperwork__paperworks')->onDelete('cascade');
            
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
        Schema::dropIfExists('ipaperwork__company_paperwork');
    }
}
