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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->timestamps();
        });

        \App\Models\RoomType::create( [
            'name' => 'Single',
            'desc'=>'Only one bed'
        ]);
        \App\Models\RoomType::create( [
            'name' => 'Double',
            'desc'=>'Tow  beds'
        ]);
        \App\Models\RoomType::create( [
            'name' => 'Suite',
            'desc'=>'Tow Rooms and 4 beds'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
