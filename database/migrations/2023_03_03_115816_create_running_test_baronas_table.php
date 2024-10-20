<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunningTestBaronasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_test_baronas', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_running');
            $table->integer('jumlah_nilai');
            $table->integer('jumlah_waktu');
            $table->foreignId('baronas_id')->constrained('baronas')->onDelete('cascade');
            $table->integer('peringkat');
            $table->string('note');
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
        Schema::dropIfExists('running_test_baronas');
    }
}
