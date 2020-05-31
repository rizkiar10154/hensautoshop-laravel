<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBrandKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_kategori', function (Blueprint $table) {

            //            create table brand kategori
            $table->increments('id');
            $table->integer('id_brand')->unsigned()->index();
            $table->integer('id_kategori')->unsigned()->index();
            $table->timestamps();

            //            set pk
            //            $table->primary(['id_brand','id_kategori']);





            //            set FK kategori brand
            $table->foreign('id_brand')
                ->references('id')
                ->on('brand')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //            set FK kategori brand
            $table->foreign('id_kategori')
                ->references('id')
                ->on('kategori')
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
        Schema::dropIfExists('brand_kategori');
    }
}
