<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSemifinalStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('electras', function (Blueprint $table) {
        //     $table->integer('status_lolos')->default(0);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('electras', function (Blueprint $table) {
            $table->integer('status_lolos')->default(0);
        });
    }
}
