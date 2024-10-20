<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaronasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baronas', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->nullable();
            $table->string('email');
            $table->string('nama_tim');
            $table->string('kategori');
            $table->string('nama_ketua');
            $table->string('nama_anggota')->nullable();
            $table->string('nama_anggotadua')->nullable();
            $table->string('sekolah');
            $table->string('alamat_sekolah');
            $table->string('nama_pembina')->nullable();
            $table->string('nomor_hp');
            $table->string('region')->nullable();
            $table->integer('gelombang');
            $table->integer('tahapan_status');
            $table->string('pembayaran_bank')->nullable();
            $table->string('pembayaran_atas_nama')->nullable();
            $table->integer('pembayaran_status');
            $table->string('pembayaran_bukti')->nullable();
            $table->string('file_ktp_ketua')->nullable();
            $table->string('file_ktp_anggota')->nullable();
            $table->string('file_ktp_anggotadua')->nullable();
            $table->string('upload_twibbon')->nullable();
            $table->string('file_abstrak')->nullable();
            $table->string('file_full_paper')->nullable();
            $table->string('link_video')->nullable();
            $table->string('file_ppt')->nullable();
            $table->string('file_poster')->nullable();
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
        Schema::dropIfExists('baronas');
    }
}
