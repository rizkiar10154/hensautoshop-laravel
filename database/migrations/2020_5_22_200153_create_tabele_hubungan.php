<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabeleHubungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubungan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable(false);
            $table->string('email')->nullable(false);
            $table->text('subjek')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('kota')->nullable(false);
            $table->text('pesan')->nullable(false);
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
        Schema::dropIfExists('hubungan');
    }
}
