<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditNewEvolve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_evolve', function (Blueprint $table) {
            // $table->string('pembayaran_bukti')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_evolve', function (Blueprint $table) {
            // $table->dropColumn('pembayaran_bukti');
            //

        });
    }
}
