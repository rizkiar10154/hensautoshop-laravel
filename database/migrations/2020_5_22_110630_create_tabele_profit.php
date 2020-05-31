<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabeleProfit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order')->unsigned()->index();
            $table->decimal('biaya',10,2);
            $table->enum('status',['sukses','batal'])->default("sukses")->index();
            $table->timestamps();


            //            set FK id konsumen
            $table->foreign('id_order')
                ->references('id')
                ->on('order')
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
        Schema::dropIfExists('profit');
    }
}
