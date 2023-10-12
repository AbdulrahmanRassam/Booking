<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->integer('room_no');
            $table->string('photo_path', 2048)->nullable();
            $table->integer('price')->default(100);

            $table->string('type_code')->default('RoomTypeSinglePro');
            $table->string('status_code')->default('RoomStatusAvailablePro');

            $table->foreign('type_code')->references('prog_name')->on('configs');
            $table->foreign('status_code')->references('prog_name')->on('configs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
