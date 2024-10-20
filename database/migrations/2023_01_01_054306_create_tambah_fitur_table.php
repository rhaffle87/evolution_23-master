<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahFiturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambah_fiturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju')->nullable();
            $table->string('sub_divisi');
            $table->text('permintaan');
            $table->string('gambar')->nullable();
            $table->string('video')->nullable();
            $table->tinyInteger('status_develop')->default(0);
            $table->tinyInteger('status_review')->default(0);
            $table->tinyInteger('status_selesai')->default(0);
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
