<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('electras', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->nullable();
            $table->string('email');
            $table->string('nama_tim');
            $table->string('nama_ketua');
            $table->string('kelas_ketua');
            $table->string('nama_anggota');
            $table->string('kelas_anggota');
            $table->string('sekolah');
            $table->string('alamat_sekolah');
            $table->string('nomor_hp_ketua');
            $table->string('nomor_hp_anggota');
            $table->string('region')->nullable();
            $table->string('pembayaran_bank')->nullable();
            $table->string('pembayaran_atas_nama')->nullable();
            $table->integer('pembayaran_status');
            $table->string('pembayaran_bukti')->nullable();
            $table->string('file_ktp_ketua')->nullable();
            $table->string('file_ktp_anggota')->nullable();
            $table->integer('status_lolos')->default(0);
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
        Schema::dropIfExists('electras');
    }
}
