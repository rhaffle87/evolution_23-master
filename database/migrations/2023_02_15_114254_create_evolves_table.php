<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolves', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('institusi');
            $table->string('alamat');
            $table->string("no_identitas");
            $table->string('nomor_telp');

            $table->integer('jumlah_tiket')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('pembayaran_bukti')->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('is_ticket_send')->default(0);
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
        Schema::dropIfExists('evolves');
    }
}
