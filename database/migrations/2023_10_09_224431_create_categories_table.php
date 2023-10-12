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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('father')->unsigned()->default(0);
            $table->boolean('isMain')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        \App\Models\Category::create( [
            'name' => 'Root',
            'status' => false,
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
