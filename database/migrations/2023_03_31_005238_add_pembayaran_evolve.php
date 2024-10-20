<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPembayaranEvolve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolves', function (Blueprint $table) {
            //
            $table->string('pembayaran_bank')->nullable();
            $table->string('pembayaran_nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolves', function (Blueprint $table) {
            //
            $table->dropColumn('pembayaran_bank');
            $table->dropColumn('pembayaran_nama');
        });
    }
}