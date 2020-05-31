<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatHenspayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_henspay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penerima_id')->index();
            $table->string('penerima_phone', 14)->index();
            $table->decimal('nominal', 10, 2)->default("0");
            $table->enum('jenis_transaksi', ['topup', 'refound'])->default("topup")->index();
            $table->enum('penerima_tipe', ['brand', 'konsumen'])->index();
            $table->integer('pengirim_id')->index();
            $table->enum('pengirim_tipe', ['brand', 'admin', 'kurir'])->index();
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
        Schema::dropIfExists('riwayat_henspay');
    }
}
