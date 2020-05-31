<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKonsumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('konsumen_nama',150);
            $table->string('konsumen_phone',14)->unique()->index();
            $table->string('konsumen_email',200);
            $table->decimal('konsumen_balance',10,2)->default("0");
            $table->boolean('konsumen_blacklist')->default(false);
            $table->text('token');
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
        Schema::dropIfExists('konsumen');
    }
}
