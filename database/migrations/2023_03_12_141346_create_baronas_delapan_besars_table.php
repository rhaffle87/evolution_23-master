<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaronasDelapanBesarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baronas_delapan_besars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('baronas_id')->constrained('baronas')->onDelete('cascade');
            $table->integer('grade');
            $table->integer('runtime');
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
        Schema::dropIfExists('baronas_delapan_besars');
    }
}
