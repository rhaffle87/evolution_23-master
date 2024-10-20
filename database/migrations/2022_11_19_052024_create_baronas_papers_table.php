<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaronasPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baronas_papers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_ketua');
            $table->string('nama_anggota_1');
            $table->string('nama_anggota_2');
            $table->string('asal_sekolah');
            $table->string('alamat_sekolah');
            $table->string('nama_pembina');
            $table->string('no_hp');
            $table->string('judul');
            $table->string('subtema');
            $table->string('ktp_ketua');
            $table->string('ktp_anggota_1');
            $table->string('ktp_anggota_2');
            $table->string('file_paper');
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
        Schema::dropIfExists('baronas_papers');
    }
}
