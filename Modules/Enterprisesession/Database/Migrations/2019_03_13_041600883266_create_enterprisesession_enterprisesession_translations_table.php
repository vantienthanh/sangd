<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesessionEnterprisesessionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprisesession__enterprisesession_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('enterprisesession_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['enterprisesession_id', 'locale']);
            $table->foreign('enterprisesession_id')->references('id')->on('enterprisesession__enterprisesessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enterprisesession__enterprisesession_translations', function (Blueprint $table) {
            $table->dropForeign(['enterprisesession_id']);
        });
        Schema::dropIfExists('enterprisesession__enterprisesession_translations');
    }
}
