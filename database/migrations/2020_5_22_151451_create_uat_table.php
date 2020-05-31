<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user')->nullable(false);
            $table->integer('soal_1')->nullable(false);
            $table->integer('soal_2')->nullable(false);
            $table->integer('soal_3')->nullable(false);
            $table->integer('soal_4')->nullable(false);
            $table->integer('soal_5')->nullable(false);
            $table->integer('soal_6')->nullable(false);
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
        Schema::dropIfExists('uat');
    }
}
