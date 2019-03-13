<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersessionMembersessionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membersession__membersession_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('membersession_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['membersession_id', 'locale']);
            $table->foreign('membersession_id')->references('id')->on('membersession__membersessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membersession__membersession_translations', function (Blueprint $table) {
            $table->dropForeign(['membersession_id']);
        });
        Schema::dropIfExists('membersession__membersession_translations');
    }
}
