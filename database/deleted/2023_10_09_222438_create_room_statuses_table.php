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
        Schema::create('room_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->timestamps();
        });

        \App\Models\RoomType::create( [
            'name' => 'Avaliable',

        ]);
        \App\Models\RoomType::create( [
            'name' => 'Booked',
        ]);
        \App\Models\RoomType::create( [
            'name' => 'Pending',
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_statuses');
    }
};
