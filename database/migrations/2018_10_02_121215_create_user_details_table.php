<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('email')->nullable()->unique();
            $table->integer('party_id')->default(0);
            $table->string('image');
            $table->integer('position_id')->default(0);
            $table->integer('state_id')->default(0);
            $table->integer('senatorial_district_id')->default(0);
            $table->integer('federal_constituency_id')->default(0);
            $table->integer('lcda_id')->default(0);
            $table->string('sub_code')->nullable();
            $table->string('profile')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
