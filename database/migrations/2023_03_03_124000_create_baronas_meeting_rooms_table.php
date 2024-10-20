<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaronasMeetingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baronas_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('break_out_room_id')->constrained('break_out_rooms')->onDelete('cascade')->nullable();
            $table->string('status');
            $table->foreignId('baronas_id')->constrained('baronas')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('baronas_meeting_rooms');
    }
}
