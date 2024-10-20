<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaronasDelapanBesarMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baronas_delapan_besar_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team1_id')->constrained('baronas_delapan_besars')->onDelete('cascade');
            $table->foreignId('team2_id')->constrained('baronas_delapan_besars')->onDelete('cascade');
            $table->string('result')->nullable();
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
        Schema::dropIfExists('baronas_delapan_besar_matches');
    }
}
