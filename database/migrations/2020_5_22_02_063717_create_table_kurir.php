<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKurir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_brand')->unsigned();
            $table->string('kurir_nama', 150);
            $table->string('kurir_phone', 14)->unique()->index();
            $table->string('kurir_email', 200);
            $table->boolean('kurir_delete')->default(false)->index();
            $table->text('token')->nullable();
            $table->timestamps();

            //            set FK id_brand
            $table->foreign('id_brand')
                ->references('id')
                ->on('brand')
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
        Schema::dropIfExists('kurir');
    }
}
