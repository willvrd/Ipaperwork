<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaperworkUserPaperworkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaperwork__user_paperwork_histories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->integer('user_paperwork_id')->unsigned();
            $table->foreign('user_paperwork_id')->references('id')->on('ipaperwork__user_paperwork')->onDelete('restrict');

            $table->tinyInteger('status')->default(0)->unsigned();
            $table->integer('notify')->default(1)->unsigned();
            $table->text('comment')->default('')->nullable();

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
        Schema::dropIfExists('ipaperwork__user_paperwork_histories');
    }
}
