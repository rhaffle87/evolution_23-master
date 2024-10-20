<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAndAddPembayaranEvolve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('new_evolve', function (Blueprint $table) {
            //
            // $table->string('pembayaran_bank')->nullable();
            // $table->string('pembayaran_nama')->nullable();
            // $table->integer('pembayaran_status')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('new_evolve', function (Blueprint $table) {
            //
            // $table->dropColumn('pembayaran_bank');
            // $table->dropColumn('pembayaran_nama');
            // $table->dropColumn('pembayaran_status');

        });
    }
}
