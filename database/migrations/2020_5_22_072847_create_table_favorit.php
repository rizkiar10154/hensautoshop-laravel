<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFavorit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_accesories')->unsigned();
            $table->integer('id_konsumen')->unsigned();
            $table->timestamps();


            //            set FK id_accesories
            $table->foreign('id_accesories')
                ->references('id')
                ->on('accesories')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            //            set FK id_konsumen
            $table->foreign('id_konsumen')
                ->references('id')
                ->on('konsumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorit');
    }
}
