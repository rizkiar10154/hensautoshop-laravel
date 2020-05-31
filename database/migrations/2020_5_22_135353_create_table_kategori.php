<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori_nama');
            $table->string('kategori_deskripsi');
            $table->timestamps();
        });


        //        set FK di kolom menu_kategori_id di table menu
//        Schema::table('menu',function (Blueprint $table){
//            $table->foreign('menu_kategori_id')
//                ->references('id')
//                ->on('kategori')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //        Drop FK di kolom menu_restoran_id pada table menu
//        Schema::table('menu',function (Blueprint $table){
//            $table->dropForeign('menu_menu_kategori_id_foreign');
//        });

        Schema::dropIfExists('kategori');
    }
}
