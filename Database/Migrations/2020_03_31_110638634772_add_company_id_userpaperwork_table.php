<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdUserPaperworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('ipaperwork__user_paperwork', function (Blueprint $table) {

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('ipaperwork__companies')->onDelete('restrict');

            $table->text('city')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipaperwork__user_paperwork', function (Blueprint $table) {

            $table->dropForeign('company_id');
            $table->dropColumn('company_id');

            $table->dropColumn('city')->nullable();

        });
    }
}
