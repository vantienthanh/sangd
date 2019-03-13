<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobNewsJobNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobnews__jobnews_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('jobnews_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['jobnews_id', 'locale']);
            $table->foreign('jobnews_id')->references('id')->on('jobnews__jobnews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobnews__jobnews_translations', function (Blueprint $table) {
            $table->dropForeign(['jobnews_id']);
        });
        Schema::dropIfExists('jobnews__jobnews_translations');
    }
}
