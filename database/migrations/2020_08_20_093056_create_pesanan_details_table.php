<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barang_id');
            $table->string('pesanan_id');
            $table->string('user_id');
            $table->string('photo');
            $table->string('item_name');
            $table->string('price');
            $table->string('color');
            $table->string('weight');
            $table->string('item_total');
            $table->string('jumlah_harga');
            $table->string('jumlah_weight');
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
        Schema::dropIfExists('pesanan_details');
    }
}
