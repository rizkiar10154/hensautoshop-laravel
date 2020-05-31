<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_nama')->index();
            $table->string('brand_phone', 14)->unique()->index();
            $table->string('brand_email', 200);
            $table->text('brand_alamat');
            $table->text('brand_latitude')->nullable(true);
            $table->text('brand_longitude')->nullable(true);
            $table->text('brand_deskripsi');
            $table->boolean('brand_oprasional')->default(false)->index();
            $table->string('brand_foto');
            $table->string('brand_pemilik_nama', 200);
            $table->string('brand_pemilik_email', 200);
            $table->string('brand_pemilik_phone', 14)->index();
            $table->decimal('brand_balance', 10, 2)->default("0");
            $table->enum('brand_delivery', ['gratis', 'flat'])->index();
            $table->decimal('brand_delivery_tarif', 10, 2)->default("0");
            $table->integer('brand_delivery_jarak');
            $table->decimal('brand_delivery_minimum', 10, 2)->default("0");
            $table->enum('brand_status', ['aktif', 'non_aktif', 'review', 'blacklist', 'tolak'])->default("review")->index();
            $table->text('token')->nullable(true);
            $table->timestamps();
        });


        //        set FK di kolom menu_brand_id di table menu
        //        Schema::table('menu',function (Blueprint $table){
        //            $table->foreign('menu_brand_id')
        //                ->references('id')
        //                ->on('brand')
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
        //        Drop FK di kolom menu_brand_id pada table menu
        //        Schema::table('menu',function (Blueprint $table){
        //            $table->dropForeign('menu_brand_id_foreign');
        //        });

        Schema::dropIfExists('brand');
    }
}
