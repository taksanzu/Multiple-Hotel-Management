<?php

use App\Models\Rooms;
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
        Schema::table('room_images', function (Blueprint $table) {
            $table->foreignIdFor(Rooms::class, 'room_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_images', function (Blueprint $table) {
            //
        });
    }
};
