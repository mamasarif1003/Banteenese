<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('username');
            $table->string('address_id');
            $table->string('date');
            $table->string('status');
            $table->string('ongkir');
            $table->string('kurir');
            $table->string('total_harga');
            $table->string('pembayaran');
            $table->string('total_tagihan');
            $table->string('total_weight');
            $table->string('code');
            $table->string('receipt_number')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
}
