<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewEvolveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_evolves', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('instansi');
            $table->string('nama_band');
            $table->string('no_invoice')->nullable();

            $table->integer('is_verified')->default(0);

            $table->integer('pembayaran_status')->default(0);
            $table->string('pembayaran_bank')->nullable();
            $table->string('pembayaran_nama')->nullable();
            $table->string('pembayaran_bukti')->nullable();

            $table->string('nama1');
            $table->string('nama2');
            $table->string('nama3');
            $table->string('nama4');
            $table->string('nama5');
            $table->string('nama6')->nullable();
            $table->string('nama7')->nullable();

            $table->string('scan');
            $table->string('instagram');
            $table->string('tiktok');

            $table->string('link_youtube')->nullable();

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
        Schema::dropIfExists('new_evolves');
    }
}
