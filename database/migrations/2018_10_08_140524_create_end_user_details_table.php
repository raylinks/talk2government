<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('end_user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('email');
            $table->integer('state_id');
            $table->integer('state_lga');
            $table->integer('residence_id');
            $table->integer('residence_lga');
            $table->string('gender');
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
        Schema::dropIfExists('end_user_details');
    }
}
