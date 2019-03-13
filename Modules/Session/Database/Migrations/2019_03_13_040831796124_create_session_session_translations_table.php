<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionSessionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session__session_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('session_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['session_id', 'locale']);
            $table->foreign('session_id')->references('id')->on('session__sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('session__session_translations', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
        });
        Schema::dropIfExists('session__session_translations');
    }
}
