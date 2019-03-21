<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileFrontendUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile__frontendUserInfos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('address');
            $table->string('job');
            $table->string('jobDetail');
            $table->string('educationLevel');
            $table->string('birthday');
            $table->string('description');
            $table->tinyInteger('user_id');
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
        Schema::dropIfExists('profile__frontendUserInfos');
    }
}
