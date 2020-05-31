<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabeleAccesories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_brand')->unsigned();
            $table->integer('id_kategori')->unsigned();
            $table->string('accesories_nama')->index();
            $table->string('accesories_foto');
            $table->decimal('accesories_harga', 10, 2);
            $table->text('accesories_deskripsi');
            $table->boolean('accesories_ketersediaan')->default(false)->index();
            $table->double('accesories_discount')->nullable(true);
            $table->boolean('accesories_delete')->default(false);
            $table->timestamps();



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
        Schema::dropIfExists('accesories');
    }
}
