<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPembayaranStatusEvolve extends Migration
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
            $table->integer('pembayaran_status')->default(0);
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
            $table->dropColumn('pembayaran_status');
            //
        });
    }
}