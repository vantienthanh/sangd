<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembercvMembercvTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membercv__membercv_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('membercv_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['membercv_id', 'locale']);
            $table->foreign('membercv_id')->references('id')->on('membercv__membercvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membercv__membercv_translations', function (Blueprint $table) {
            $table->dropForeign(['membercv_id']);
        });
        Schema::dropIfExists('membercv__membercv_translations');
    }
}
