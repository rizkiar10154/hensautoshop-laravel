<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order')->unsigned()->index();
            $table->integer('id_accesories')->unsigned()->index();
            $table->integer('qty');
            $table->decimal('harga', 10, 2);
            $table->integer('discount')->default('0');
            $table->text('catatan')->nullable(true);
            $table->timestamps();


            //            set FK id_order
            $table->foreign('id_order')
                ->references('id')
                ->on('order')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //            set FK accesories
            $table->foreign('id_accesories')
                ->references('id')
                ->on('accesories')
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
        Schema::dropIfExists('detail_order');
    }
}
